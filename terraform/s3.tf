resource "aws_s3_bucket" "artifact_bucket" {
  bucket        = "${var.project_name}-artifacts"
  force_destroy = true
}


# Bucket for Elastic Beanstalk application versions
resource "aws_s3_bucket" "eb_app_bucket" {
  bucket        = "${var.project_name}-app-bucket"
  force_destroy = true
}
