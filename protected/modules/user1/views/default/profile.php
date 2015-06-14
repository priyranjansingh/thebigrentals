<div class="row-fluid">
   
    <div class="span4"></div>
    <div class="span4">
        

        <div class="portlet" id="yw0">
            <div class="portlet-decoration">
                <div class="portlet-title">User Profile</div>
            </div>
            <div class="portlet-content">
                <?php  
                  pre(Yii::app()->session['user_name']);
                  pre(Yii::app()->session['user_id']);
                ?>
            </div>
        </div>


    </div>
    <div class="span4"></div>
</div>
