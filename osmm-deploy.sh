#!/bin/bash

# git clone https://github.com/finos-labs/osmm.git
# cd osmm
# git pull
# chmod +x osmm-deploy.sh

export CHECKOUT=/home/bitnami/osmm/code
export DEST=/home/bitnami/stack

cp -f $CHECKOUT/limesurvey/application/views/admin/export/statistics_user_view.php $DEST/limesurvey/application/views/admin/export
cp -f $CHECKOUT/limesurvey/application/helpers/common_helper.php $DEST/limesurvey/application/helpers
cp -f $CHECKOUT/limesurvey/application/controllers/admin/statistics.php $DEST/limesurvey/application/controllers/admin
cp -f $CHECKOUT/limesurvey/application/controllers/colorcodes.csv $DEST/limesurvey/application/controllers
cp -f $CHECKOUT/limesurvey/application/helpers/admin/statistics_helper.php $DEST/limesurvey/application/helpers/admin
cp -f $CHECKOUT/limesurvey/application/controllers/PrintanswersController.php $DEST/limesurvey/application/controllers
cp -f $CHECKOUT/limesurvey/themes/survey/vanilla/views/subviews/printanswers/printanswers_table.twig $DEST/limesurvey/themes/survey/vanilla/views/subviews/printanswers
cp -f $CHECKOUT/limesurvey/application/views/admin/export/generatestats/simplestats/_statisticsoutput_aggregate_graphs.php $DEST/limesurvey/application/views/admin/export/generatestats/simplestats
cp -f $CHECKOUT/limesurvey/application/views/admin/export/generatestats/simplestats/_statisticsoutput_aggregate_bar_graphs.php $DEST/limesurvey/application/views/admin/export/generatestats/simplestats

cp -Rf $CHECKOUT/limesurvey/assets/scripts/admin/dist $DEST/limesurvey/assets/scripts/admin
cp -f $CHECKOUT/limesurvey/assets/scripts/admin/Chart.min.js $DEST/limesurvey/assets/scripts/admin

cp -f $CHECKOUT/limesurvey/*.html $DEST/limesurvey
