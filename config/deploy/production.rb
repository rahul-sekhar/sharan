set :user, "sharan"
set :use_sudo, false
set :deploy_to, "/home/#{user}/sharan.com/deploys/sharan"
set :uploads_path, "/home/#{user}/sharan.com/wp-content/uploads"
set :host_name, "sharan.com"

server host_name, :app, :web, :db, :primary => true