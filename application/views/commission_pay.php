
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Commission Pay</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                   
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Commission Pay </h2>
                    </header>

                    <!-- widget div-->
                    <div role="content">

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            
                            <form class="smart-form" id="commission_pay_frm" method="post" action="">
                                <div class="invest_msg"></div>                               

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-12">
                                            <div class="row">
                                                
                                                <section class="col col-1.5">
                                                    <label class="control-label">
                                                        Date Range<span class="alert">*</span>
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="input">
                                                        <input type="text" name="daterange" class="daterange">
                                                    </label>
                                                </section>
                                                
                                                <section class="col col-1.5">
                                                    <label class="control-label">
                                                        Ref&nbsp;Name<span class="alert">*</span>
                                                    </label>
                                                </section>
                                                <section class="col col-3">
                                                    <label class="select">
                                                        <select class="input-sm ref_id" name="ref_id">
                                                            <option value="">Select Service</option>
                                                            <?php
                                                                foreach ($commission_holder_info as $csrow)
                                                                { ?>
                                                                    <option value="<?= $csrow->name."_".$csrow->ref_info_id;; ?>"><?= $csrow->name; ?></option>
                                                                <?php }
                                                            ?>
                                                        </select>
                                                        <i></i>
                                                    </label>
                                                </section>
                                            </div> 
                                            <div class="row">
                                                <!--<section class="col col-12">-->
                                                <table id="sum_table" class="table table-bordered">
                                                        <thead>
                                                            <tr class="titlerow">
                                                                <th>P.Id</th>
                                                                <th>P.Name</th>
                                                                <th>Bill Date</th>
                                                                <?php echo get_specification_json_type(array(),"title"); ?>
                                                                <th>Less</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="show_search_value">
                                                             
                                                        </tbody>
                                                </table>
                                                <!--</section>-->                                                
                                            </div>                                            
                                        </section>
                                        <section class="col col-4">
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Payble
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="total_price" name="payable" value="0" placeholder="Total" type="text">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Less
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="less" name="less" type="text" value="0">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                       paid
                                                    </label>
                                                </section>                                                
                                                
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="tpaid" type="text" name="paid" value="0">
                                                    </label>
                                                </section>
                                            </div>
                                        </section>
                                    </div>
                                    
                                </fieldset>

                                <footer>
                                    <button type="submit" class="btn btn-primary" id="commission_pay_submit">
                                        Save&Print
                                    </button>
                                    <button type="button" class="btn btn-default" onclick="window.history.back();">
                                        Back
                                    </button>
                                </footer>
                            </form>

                        </div>

                    </div>

                </div>

            </article>

        </div>

    </div>

</div>



<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script>
    $('.daterange').daterangepicker({
        "showDropdowns": true,
        "autoApply": true
    });
    $(document).on("input",".percenttotalvalue",function() {
        var totals=[<?php echo $this->investigation_billing_model->get_service_total("total_count"); ?>];
        var jak=[<?php echo $this->investigation_billing_model->get_service_total("total_count"); ?>];
        
        var $dataRows=$("#sum_table tr:not('.totalColumn, .titlerow, .percentColumn, percentTotalColumn')");
        $dataRows.each(function() {
            //alert(totals);
            $(this).find('.rowDataSd').each(function(i){
                totals[i]+=parseInt( $(this).html());
            });
        });
        //alert(totals);
        $("#sum_table td.totalCol").each(function(i){  
            $(this).html(totals[i]);
        });
        $(".percenttotalvalue").each(function(i){  
            jak[i] = $(this).val();            
        });


        var $dataTotal=$("#sum_table tr:not('.titlerow, .serviceField, .percentTotalColumn')");
        $dataTotal.each(function() {
            $(this).find('.totalCol').each(function(i){
                totals[i]=parseInt( $(this).html());
            });
        });
        $("#sum_table td.percenttotal").each(function(i){
            //alert(jak);
            $(this).attr("percent",jak[i]);
            var percent = parseInt($(this).attr('percent'));
            //alert(percent);
            var percentTotal = (totals[i]*percent)/100;
            $(this).html(percentTotal);
        });

        $('.less').val($('.totalpayableless').html());

        var totalPayable = 0;
        $('.totalpayable').each(function(){
            var tphtml = parseInt($(this).html())
            totalPayable = totalPayable+tphtml;
        });
        $('.total_price').val(totalPayable);
        $('.tpaid').val(totalPayable);
    });
    
    
    
    $(document).on("change",".ref_id",function() {
        var date_range = $('.daterange').val();
        var ref_id = $(this).val();
        $.ajax({
            url: '<?php echo base_url(); ?>admin/commission_pay_search_value',
            type: 'POST',
            data: {date_range:date_range,ref_id:ref_id},
            success: function (response) {
                $(".show_search_value").html(response);
                var totals=[<?php echo $this->investigation_billing_model->get_service_total("total_count"); ?>];
                var $dataRows=$("#sum_table tr:not('.totalColumn, .titlerow, .percentColumn, percentTotalColumn')");
                $dataRows.each(function() {
                    $(this).find('.rowDataSd').each(function(i){
                        totals[i]+=parseInt( $(this).html());
                    });
                });
                $("#sum_table td.totalCol").each(function(i){  
                    $(this).html(totals[i]);
                });
                
                
                var $dataTotal=$("#sum_table tr:not('.titlerow, .serviceField, .percentTotalColumn')");
                $dataTotal.each(function() {
                    $(this).find('.totalCol').each(function(i){
                        totals[i]=parseInt( $(this).html());
                    });
                });
                $("#sum_table td.percenttotal").each(function(i){
                    var percent = parseInt($(this).attr('percent'));
                    //alert("("+totals[i]+"*"+percent+")/100");
                    var percentTotal = (totals[i]*percent)/100;
                    $(this).html(percentTotal);
                });
                
                $('.less').val($('.totalpayableless').html());
                
                var totalPayable = 0;
                $('.totalpayable').each(function(){
                    var tphtml = parseInt($(this).html())
                    totalPayable = totalPayable+tphtml;
                });
                $('.total_price').val(totalPayable);
                $('.tpaid').val(totalPayable);
            }
        });
    });
    
    
    
    $(document).on("click","#commission_pay_submit",function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url(); ?>admin/commission_pay_submit',
            type: 'POST',
            data: $('#commission_pay_frm').serialize(),
            success: function (response) {
                var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
                if(responsetext > 0)
                {
                    var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                    htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                    htm += '<strong>Success!</strong> Successfully Saved';
                    htm +='</div>';
                    $('.invest_msg').html(htm);
                    location.reload();
                    window.open(
                        'commission_pay_report_pdf/'+responsetext,
                        '_blank'
                    );
                }
                else
                {
                    var htm ='<div style="margin:10px;" class="alert alert-danger alert-dismissable">';
                    htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                    htm += response;
                    htm +='</div>';
                    $('.invest_msg').html(htm);
                }
            }
        });
    });
    
</script>


