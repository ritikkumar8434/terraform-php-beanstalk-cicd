resource "aws_s3_bucket" "artifact_bucket" {
  bucket        = "${var.project_name}-artifacts"
  force_destroy = true
}
