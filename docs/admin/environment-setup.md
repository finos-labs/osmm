# Environment setup

This page helps with the setup/upgrade of a LimeSurvey server to use the latest definition of OSMM survey.

The intructions below have been tested on a [Linux AMI server packaged by Bitnami](https://bitnami.com/stack/limesurvey/cloud/aws/amis).

```
# Perform a backup
cp -rf stack/limesurvey/ backups/limesurvey-2022-07-21
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
