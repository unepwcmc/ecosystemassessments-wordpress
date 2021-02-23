################################################################################
## Setup Environment
################################################################################

# The Git branch this environment should be attached to.
set :branch, 'production_deploy'

# The environment's name. To be used in commands and other references.
set :stage, :production

# The URL of the website in this environment.
set :stage_url, 'ecosystemassessments.production.wordpress-linode.linode.unep-wcmc.org'

# The environment's server credentials
server 'production.wordpress-linode.linode.unep-wcmc.org', user: 'wcmc', roles: %w(web app db)

# The deploy path to the website on this environment's server.
set :deploy_to, "/home/#{fetch(:deploy_user)}/#{fetch(:application)}"

# The web user on this environment's server.
set :web_user, 'www-data'
