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
1. Visit https://community.limesurvey.org/downloads/ and copy the link address of the (first) `Download` button for the latest CE version; don't use the LTS version, choose the first `Download` button.
2. Perform a backup of the `stack/limesurvey` folder as described in the previous section
3. From the EC2 box, run `curl -O <copied URL>` in the root folder
4. Unzip the archive with `unzip limesurvey<version>.zip`
5. Remove current LS folder with `rm -rf stack/limesurvey`
6. Copy the new version over, with `mv ~/limesurvey ~/stack`
7. Run the OSMM deployment using `cd osmm ; ./osmm-deploy.sh`
8. Cleanup downloads using `rm -rf ~/*.zip`
9. Setup config, data and permissions from previous install
```
sudo rm -rf ~/stack/limesurvey/tmp/ ~/stack/limesurvey/upload/ ~/stack/limesurvey/application/config/
cp -Rf ~/backups/limesurvey-2022-07-25/tmp/ ~/stack/limesurvey/
cp -Rf ~/backups/limesurvey-2022-07-25/upload/ ~/stack/limesurvey/
cp -Rf ~/backups/limesurvey-2022-07-25/application/config/config.php ~/stack/limesurvey/application/config
sudo chmod -R 777 ~/stack/limesurvey/tmp/
```

Make sure that `/opt/bitnami` is writeable by the `bitnami` user - `sudo chown bitnami:bitnami /opt/bitnami`.
