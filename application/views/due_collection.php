
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Due Collection</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                   
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Due Collection </h2>
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
                            
                            <form class="smart-form" id="investigation_billing_frm" method="post" action="">
                                <div class="invest_msg"></div>
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-1">
                                            <label class="control-label">
<!--                                                Patient ID-->
                                                &nbsp;
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <!--<input placeholder="Patient ID" name="patient_id" type="text">-->
                                                &nbsp;
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="control-label">
                                                &nbsp;
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label">
                                                Date
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input type="date" value="<?php echo date("Y-m-d"); ?>">
                                            </label>
                                        </section>
                                    </div>

                                    <div class="row">                                        
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Patient ID<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-3">
                                            <label class="select">
                                                <select class="input-sm bill_id">
                                                    <option value="">Select Patient Id</option>
                                                   <?php
                                                       foreach ($bill_id as $bi)
                                                       {?>
                                                            <option value="<?php echo $bi->investigation_billing_id; ?>"><?php echo $bi->investigation_billing_id; ?></option>
                                                       <?php }
                                                    ?> 
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>                                        
                                    </div>

                                    <div class="row">
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Patient Name
                                            </label>
                                        </section>
                                        <section class="col col-3.5">
                                            <label class="input">
                                                <input class="patient_name" readonly="readonly" type="text">
                                            </label>
                                        </section>
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Delivery Date
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input class="ddelivery_date" readonly="readonly" type="text">
                                            </label>
                                        </section>                                        
                                    </div>

                                    <div class="row">
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Ref. Dr. ID
                                            </label>
                                        </section>
                                        <section class="col col-3.5">
                                            <label class="input">
                                                <input  class="dref_dr_id" readonly="readonly" type="text">
                                            </label>
                                        </section>
                                                                               
                                    </div>
                                    
                                    <div class="row">
                                        <section class="col col-1.5">
                                            <label class="control-label">
                                                Dr. Name
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="input">
                                                <input class="ddr_name" readonly="readonly" type="text">
                                            </label>
                                        </section>                                                                               
                                    </div>
                                         
                                </fieldset>

                                <fieldset>
                                    <div class="row">                                        
                                        <section class="col col-4">
                                            <div class="row">
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Total
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="total_price" readonly="readonly" type="text">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Less
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="less" type="text" readonly="readonly">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Less%
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="less_percent" type="text" readonly="readonly">
                                                    </label>
                                                </section>
                                                
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Prev. Paid
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="prev_paid" type="text" readonly="readonly">
                                                    </label>
                                                </section>
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Due
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="due" type="text" readonly="readonly">
                                                    </label>
                                                </section>
                                                
                                                <section class="col col-4">
                                                    <label class="control-label">
                                                        Paid
                                                    </label>
                                                </section>
                                                <section class="col col-8">
                                                    <label class="input">
                                                        <input class="paid" type="text">
                                                    </label>
                                                </section>
                                            </div>
                                        </section>
                                    </div>
                                    
                                </fieldset>

                                <footer>
                                    <button type="submit" class="btn btn-primary" id="investigation_billing_submit">
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





<script>
    $(document).on("change",".bill_id",function() {
        var id = $(this).val();
        //alert(id);
        $.ajax({
            url: '<?php echo base_url(); ?>admin/bill_info',
            type: 'POST',
            dataType: "json",
            data: {id:id},
            success: function (response) {
                $('.patient_name').val(response.patient_name);
                $('.ddelivery_date').val(response.delivery_date);                
                $('.dref_dr_id').val(response.ref_name);
                $('.ddr_name').val(response.doctors_name);                
                $('.total_price').val(response.total_price);
                
                $('.less').val(response.less);
                $('.less_percent').val(response.less_percent);
                $('.prev_paid').val(response.total_paid);
                $('.due').val(response.due);
            }
        });
    });
    
    
    
    $(document).on("click","#investigation_billing_submit",function(e) {
        e.preventDefault();
        var bill_id = $(".bill_id").val();
        var due = parseInt($(".due").val());
        var prev_paid = $(".prev_paid").val();
        var paid = parseInt($(".paid").val());
        //alert(bill_id+" - "+due+"="+paid);
        if(due >= paid)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>admin/due_collection_final_submit',
                type: 'POST',
                data: {bill_id:bill_id,due:due,paid:paid,prev_paid:prev_paid},
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
                            'investigation_report_pdf/'+responsetext,
                            '_blank'
                        );
                    }                    
                }
            });
        }
        else
        {
            var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
            htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
            htm += '<strong>Warning!</strong> Something wrong.';
            htm +='</div>';
            $('.invest_msg').html(htm);
        }
        
    });
</script>


