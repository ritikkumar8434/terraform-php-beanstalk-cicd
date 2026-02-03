<?php
date_default_timezone_set('UTC');
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Sample Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        .info-box {
            background-color: #e8f5e9;
            border-left: 4px solid #4CAF50;
            padding: 15px;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .success {
            color: #4CAF50;
            font-weight: bold;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>🚀 PHP Sample Application</h1>
    <p>Welcome to the PHP application deployed on <strong>AWS Elastic Beanstalk and the changes done from cicd....</strong>!</p>

    <div class="info-box">
        <h2>Application Information</h2>
        <p><strong>Environment:</strong> <?= getenv('APP_ENV') ?: 'production'; ?></p>
        <p><strong>Deployed via:</strong> Terraform & AWS CodePipeline</p>
        <p><strong>Timestamp:</strong> <?= date('Y-m-d H:i:s'); ?></p>
    </div>

    <h2>Server Information</h2>
    <table>
        <tr><th>Parameter</th><th>Value</th></tr>
        <tr>
            <td>PHP Version</td>
            <td class="success"><?= phpversion(); ?></td>
        </tr>
        <tr>
            <td>Server Software</td>
            <td><?= $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?></td>
        </tr>
        <tr>
            <td>Server Name</td>
            <td><?= $_SERVER['SERVER_NAME'] ?? 'N/A'; ?></td>
        </tr>
        <tr>
            <td>Client IP</td>
            <td><?= $_SERVER['REMOTE_ADDR'] ?? 'N/A'; ?></td>
        </tr>
    </table>

    <h2>PHP Configuration</h2>
    <table>
        <tr><th>Setting</th><th>Value</th></tr>
        <?php
        $settings = [
            'max_execution_time',
            'memory_limit',
            'upload_max_filesize',
            'post_max_size',
            'display_errors'
        ];
        foreach ($settings as $setting): ?>
            <tr>
                <td><?= $setting ?></td>
                <td><?= ini_get($setting) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Environment Variables</h2>
    <ul>
        <?php
        $envVars = ['APP_ENV', 'RDS_HOSTNAME', 'RDS_USERNAME', 'RDS_DB_NAME'];
        foreach ($envVars as $var):
            $val = getenv($var);
            if ($val): ?>
                <li><strong><?= $var ?>:</strong> <?= htmlspecialchars($val) ?></li>
        <?php endif; endforeach; ?>
    </ul>

    <div class="info-box">
        <h2>CI/CD Pipeline</h2>
        <ol>
            <li>GitHub Commit</li>
            <li>CodePipeline Trigger</li>
            <li>CodeBuild Packages App</li>
            <li>Elastic Beanstalk Deployment</li>
        </ol>
    </div>

    <footer>
        Built with ❤️ using Terraform | AWS Elastic Beanstalk | PHP <?= PHP_VERSION ?>
    </footer>
</div>
</body>
</html>
