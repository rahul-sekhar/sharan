set :user, "sharanwp"
set :use_sudo, false
set :deploy_to, "/home/#{user}/sharan.kairi.in/deploys/sharan"
set :uploads_path, "/home/#{user}/sharan.kairi.in/wp-content/uploads"
set :host_name, "sharan.kairi.in"

server host_name, :app, :web, :db, :primary => true