set :application, "baka"
set :domain,      "spyl.net"
set :deploy_to,   "/home/spyl/www/#{application}"
set :app_path,    "app"

set :user, "root"

set :ssh_options, {
  :forward_agent => true,
  keys: [File.exist?("app/config/id_rsa") ? "app/config/id_rsa" : "%w(~/.ssh/id_rsa)"]
}

set :repository,  "https://github.com:spyl94/baka.git"
set :scm,         :git

set :model_manager, "doctrine"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :keep_releases,  3

set :shared_files, ["app/config/parameters.yml"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor", "node_modules"]
set :use_composer, true

set :writable_dirs, ["app/cache", "app/logs"]
set :webserver_user, "www-data"
set :permission_method, :acl
set :use_set_permissions, true


# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL

after "symfony:cache:warmup", "assets:install"

# Custom(ised) tasks
namespace :assets do
  desc "Compile assets"
  task :install, :except => { :no_release => true }, :roles => :app do
    run "cd #{latest_release} && npm install && bower install --allow-root && gulp"
    puts "--> Gulp executed".green
  end
end
