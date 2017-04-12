
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Accounts Statement</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
                   
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Accounts Statement </h2>
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
                            
                            <form class="smart-form" id="search_option" method="post" action="">
                                <div class="invest_msg"></div>
                                <fieldset>

                                    <div class="row">
                                        <section class="col col-2">
                                            <label class="control-label">
                                                Date Range<span class="alert">*</span>
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="input">
                                                <input type="text" name="TransactionDate" class="daterange">
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <label class="control-label pull-right">
                                                Head Title
                                            </label>
                                        </section>
                                        <section class="col col-2">
                                            <label class="select">
                                                <select class="input-sm" name="AccountName">
                                                    <option value="">Select Account</option>
                                                    <?php
                                                        foreach ($headTitle as $ht)
                                                        { ?>
                                                    <option value="<?php echo $ht["AccountName"]; ?>"><?php echo $ht["AccountName"]; ?></option>  
                                                        <?php }
                                                    ?>
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-1">
                                            <input id="search_account_statement" style="padding: 4px;" type="button" class="btn btn-primary searchResult" value="Search">
                                        </section>
                                        
                                        
                                        
                                    </div>

                                    

                                    
                                         
                                </fieldset>

                                <fieldset>
                                    <div class="row">
                                        <section class="col col-10">
                                            
                                            <div class="row">
                                                <!--<section class="col col-12">-->
                                                    <table class="table table-bordered">
                                                        <thead>
                                                                <tr>
                                                                        <th>SL#</th>
                                                                        <th>Date</th>
                                                                        <th>Account Head</th>
                                                                        <th>Narration</th>
                                                                        <th>Debit</th>
                                                                        <th>Credit</th>
                                                                        <th>Balance</th>
                                                                </tr>
                                                        </thead>
                                                        <tbody class="show_search_data">
                                                                
                                                        </tbody>
                                                </table>
                                                <!--</section>-->                                                
                                            </div>                                            
                                        </section>
                                        
                                    </div>
                                    
                                </fieldset>

                                
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
    
    
$(document).on("click",'#search_account_statement', function () {
    $.ajax({
        url: '<?php echo base_url(); ?>accounts/get_account_statement',
        type: 'POST',
        data: $('#search_option').serialize(),
        success: function (data) {   
            $('.show_search_data').html(data);
        }
    });
});
$(document).on("change",'select[name="acc_head_id"]', function () {
    var acc_head_id = $(this).val();    
    $.ajax({
        url: '<?php echo base_url(); ?>accounts_reports/get_taging_by_acc_head',
        type: 'POST',
        data: {acc_head_id:acc_head_id},
        success: function (data) {   
            $('.remobable').remove();
            $('.search_option_html').append(data);
            $('select').select2();
        }
    });
});
</script>


