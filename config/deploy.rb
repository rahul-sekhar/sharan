load "config/sensitive"

set :stages, %w(production staging)
set :default_stage, "staging"
require 'capistrano/ext/multistage'

default_run_options[:pty] = true
set :application, "sharan"
set :repository,  "git@github.com:rahul-sekhar/sharan.git"
set :scm, :git
set :ssh_options, { forward_agent: true }

set :keep_releases, 5

set :local_site_url, "sharan.dev"
set :local_uploads_path, "../../uploads"

after "deploy:restart", "deploy:cleanup"

task :uname do
  run "uname -a"
end


namespace :uploads  do
  desc "Import uploads from the remote server to the local machine"
  task :import_from_remote, :roles => :app do
    system "rsync -rtvuc --delete --progress #{user}@#{host_name}:#{uploads_path}/ #{local_uploads_path}/"
  end

  desc "Export uploads from the local machine to the remote server"
  task :export_to_remote, :roles => :app do
    system "rsync -rtvuc --delete --progress #{local_uploads_path}/ #{user}@#{host_name}:#{uploads_path}/"
  end
end


namespace :db do
  desc "Import database from the remote server to the local machine"
  task :import_from_remote, :roles => :app do
    run_locally "ssh #{user}@#{host_name} 'mysqldump -u#{db_settings[stage.to_sym][:username]} -p#{db_settings[stage.to_sym][:password]} -h#{db_settings[stage.to_sym][:host]} #{db_settings[stage.to_sym][:database]} -C -c --skip-add-locks' | mysql -u#{db_settings[:local][:username]} -p#{db_settings[:local][:password]} -h#{db_settings[:local][:host]} #{db_settings[:local][:database]}"
    run_locally "wp search-replace http://#{host_name} http://#{local_site_url}"
    run_locally "wp search-replace #{db_settings[stage.to_sym][:email]} #{db_settings[:local][:email]}"
  end

  desc "Export database from the local machine to the remote server"
  task :export_to_remote, :roles => :app do
    run_locally "mysqldump -u#{db_settings[:local][:username]} -p#{db_settings[:local][:password]} -h#{db_settings[:local][:host]} -C -c --skip-add-locks #{db_settings[:local][:database]} | ssh #{user}@#{host_name} 'mysql -u #{db_settings[stage.to_sym][:username]} -p#{db_settings[stage.to_sym][:password]} -h#{db_settings[stage.to_sym][:host]} #{db_settings[stage.to_sym][:database]}'"
    run "cd #{current_path} && wp search-replace http://#{local_site_url} http://#{host_name}"
    run "cd #{current_path} && wp search-replace #{db_settings[:local][:email]} #{db_settings[stage.to_sym][:email]}"
  end
end


# Cache
namespace :cache do
  desc "Flush the cache"
  task :flush, :roles => :app do
    run "cd #{current_path} && wp w3-total-cache flush minify && wp w3-total-cache flush database && wp w3-total-cache flush object"
  end
end

# after "deploy", "cache:flush"

# Media
namespace :media do
  desc "Regenerate images"
  task :regenerate, :roles => :app do
    run "cd #{current_path} && wp media regenerate" do |channel, stream, data|
      puts data
      channel.send_data("y\n") if data.include? "y/n"
    end
  end
end