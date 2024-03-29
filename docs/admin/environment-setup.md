# Environment setup

This page helps with the setup/upgrade of a LimeSurvey server to use the latest definition of OSMM survey.

The intructions below have been tested on a [Linux AMI server packaged by Bitnami](https://bitnami.com/stack/limesurvey/cloud/aws/amis); steps below expect to have SSH access (as `bitnami` user) to the Linux EC2 box.

## Upgrading LimeSurvey with the latest OSMM survey definition
```
# Perform a backup - please update the backup name with the current date
cp -rf stack/limesurvey/ backups/limesurvey-2022-07-21

# Run the deployment
cd osmm
./osmm-deploy.sh
```

Next step is to import the [LSS](data/osmm-survey-structure.lss) file:
1. Download the `.lss` file in your local workstation
2. Log into https://survey.osmm.finos.org/admin
3. Visit https://survey.osmm.finos.org/surveyAdministration/newSurvey to create a new survey
4. Click on `Import` and add the `.lss` that you downloaded on step 1
5. Click on `Import Survey` - this may take some time, please wait.
6. When done, click on `Go To Survey`, then on the survey name (on the breadcrumb), then click the button `Activate this Survey`
7. Click on `Activate this Survey`
8. Click on `Continue in Open-access mode`
9. Click on `Run Survey` - you can share this URL with any other stakeholder

## Upgrading LimeSurvey to the latest version
1. Visit https://community.limesurvey.org/downloads/ and copy the link address of the (first) `Download` button for the latest CE version; don't use the LTS version, choose the first `Download` button. Example:
2. Perform a backup of the `stack/limesurvey` folder as described in the previous section, with "cp -rf stack/limesurvey/ backups/limesurvey-\`date +'%Y-%m-%d'\`"
3. From the EC2 box, run `curl -O <copied URL>` in the root folder, ie `curl -O https://download.limesurvey.org/latest-stable-release/limesurvey5.4.11+221114.zip`
4. Unzip the archive with `unzip limesurvey<version>.zip`
5. Remove current LS folder with `rm -rf stack/limesurvey`
6. Copy the new version over, with `mv ~/limesurvey ~/stack`
7. Run the OSMM deployment using `cd osmm ; ./osmm-deploy.sh`
8. Make sure that `/opt/bitnami` is writeable by the `bitnami` user - `sudo chown bitnami:bitnami /opt/bitnami`
9. Setup config, data and permissions from previous install
```
sudo rm -rf ~/stack/limesurvey/tmp/ ~/stack/limesurvey/upload/
cd ~/backups/limesurvey-2022-11-15
cp -Rf ./tmp/ ~/stack/limesurvey/
cp -Rf ./upload/ ~/stack/limesurvey/
cp -Rf ./application/config/config.php ~/stack/limesurvey/application/config
sudo chmod -R 777 ~/stack/limesurvey/tmp/
sudo chown -R daemon:daemon ~/stack/limesurvey/*
```
10. Cleanup downloads using `rm -rf ~/*.zip`

You can now access the LS instance on `https://<URL>/admin`, login and make sure that everything is in place.

To debug errors, try to `cat ~/stack/apache2/logs/error_log`.

## SSL Cert updates

```
sudo /opt/bitnami/bncert-tool
```
See https://docs.bitnami.com/aws/faq/administration/generate-configure-certificate-letsencrypt/

## Restarting limesurvey

See https://docs.bitnami.com/aws/apps/limesurvey/administration/control-services/

```
sudo /opt/bitnami/ctlscript.sh restart
```
