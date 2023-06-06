<div class="row">
    <form method="post" action="<?php echo base_url("wp-network/report/historyform");?>">
        <div class="col-md-2">
            <div class="form-group">
                <label>Select Publisher</label>
                <select class="form-control" name="txtPub" id="txtPub">
                    <option value="0">Select Publisher</option>
                    <?php
                    if ($allpub) {
                        foreach ($allpub as $key => $nod) {
                            ?>
                            <option value="<?php echo $nod->id; ?>" <?php echo (isset($pubid) && $pubid == $nod->id)?'selected':''; ?>><?php echo ucwords($nod->username); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Date</label>
                <input type="text" class="form-control olddatepicker" name="txtDate" id="txtDate" value="<?php echo (isset($$txtDate) && $txtDate != '')?$txtDate:''; ?>">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>&nbsp;</label>
                <input type="submit" name="btnsearch" value="Search" class="btn btn-primary btn-block btnsearch">
            </div>
        </div>

    </form>

    <form method="post" action="">
        <div class="col-md-3">
            <div class="form-group">
                <label>Select Publisher</label>
                <select class="form-control" name="txtPub" id="txtPubdual">
                    <option value="0">Select Publisher</option>
                    <?php
                    if ($allpub) {
                        foreach ($allpub as $key => $nod) {
                            ?>
                            <option value="<?php echo $nod->id; ?>"><?php echo ucwords($nod->username); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Date range:</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
            </div>
        </div>    
        
    </form>
</div>