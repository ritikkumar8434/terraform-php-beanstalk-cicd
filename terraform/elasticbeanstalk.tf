resource "aws_elastic_beanstalk_application" "app" {
  name = var.project_name
}

resource "aws_elastic_beanstalk_environment" "env" {
  name                = "${var.project_name}-env"
  application         = aws_elastic_beanstalk_application.app.name
  solution_stack_name = "64bit Amazon Linux 2 v3.5.9 running PHP 8.1"

  setting {
    namespace = "aws:autoscaling:launchconfiguration"
    name      = "InstanceType"
    value     = "t3.micro"
  }

  setting {
  namespace = "aws:elasticbeanstalk:application:environment"
  name      = "APP_ENV"
  value     = "production"
}

setting {
  namespace = "aws:elasticbeanstalk:application:environment"
  name      = "RDS_HOSTNAME"
  value     = "example-db.endpoint.amazonaws.com"
}

setting {
  namespace = "aws:elasticbeanstalk:application:environment"
  name      = "RDS_USERNAME"
  value     = "admin"
}

setting {
  namespace = "aws:elasticbeanstalk:application:environment"
  name      = "RDS_DB_NAME"
  value     = "sampledb"
}

setting {
  namespace = "aws:elasticbeanstalk:healthreporting:system"
  name      = "SystemType"
  value     = "enhanced"
}


}
