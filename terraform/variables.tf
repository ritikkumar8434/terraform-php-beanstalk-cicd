variable "aws_region" {
  default = "us-east-1"
}

variable "project_name" {
  default = "php-beanstalk-cicd"
}

variable "github_repo" {
  description = "GitHub repo name"
}

variable "github_owner" {
  description = "GitHub username"
}

variable "github_oauth_token" {
  description = "GitHub personal access token"
  sensitive   = true
}
