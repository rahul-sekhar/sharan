set :user, "sharan"
set :use_sudo, false
# set :deploy_to, "/home/#{user}/sharan.kairi.in/deploys/sharan"
set :uploads_path, "/home/#{user}/site/wp-content/uploads"
set :host_name, "sharan-india.org"

server host_name, :app, :web, :db, :primary => true