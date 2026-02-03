resource "aws_elastic_beanstalk_application" "app" {
  name = var.project_name
}

resource "aws_elastic_beanstalk_environment" "env" {
  name                = "${var.project_name}-env"
  application         = aws_elastic_beanstalk_application.app.name
  solution_stack_name = "64bit Amazon Linux 2023 v4.9.2 running PHP 8.2"

  ########################################
  # REQUIRED: Instance Profile
  ########################################
  setting {
    namespace = "aws:autoscaling:launchconfiguration"
    name      = "IamInstanceProfile"
    value     = aws_iam_instance_profile.eb_instance_profile.name
  }

  ########################################
  # Instance configuration
  ########################################
  setting {
    namespace = "aws:autoscaling:launchconfiguration"
    name      = "InstanceType"
    value     = "t3.micro"
  }

  ########################################
  # Application environment variables
  ########################################
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

  ########################################
  # Health reporting
  ########################################
  setting {
    namespace = "aws:elasticbeanstalk:healthreporting:system"
    name      = "SystemType"
    value     = "enhanced"
  }
}
