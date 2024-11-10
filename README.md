# accureather-app

1.) Rename [.env.example](.env.example) to .env and update the MAIL configuration.

2.) Rename [google-service-account.json.example](google-service-account.json.example) to google-service-account.json and update the google credentials to create google sheet.<br /> Instructions to get the Config file => https://stackoverflow.com/questions/46287267/how-can-i-get-the-file-service-account-json-for-google-translate-api

3.) Update [constants.php](app%2Fconfig%2Fconstants.php) as per requirements.

4.) Open APP_URL/generate-report. <br />APP_URL => server url where application is running.

Eg. https://abc.com/generate-report


5.) CRON Setup<br /> <br />
`0 0 * * 0 wget https://abc.com/generate-report`
<br /> <br />Replace <b>abc.com</b> with the ip address or server URL <br />
This will RUN the CRON every week on Sunday at 12:00 AM




