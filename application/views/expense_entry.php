
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Expense Entry</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Expense Entry</h2>
                    </header>

                    <div role="content">                            
                        <div class="row">
                            <article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenDark jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" role="widget">
                                    <header role="heading">
                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Add Expense </h2>
                                    </header>

                                    <div role="content">
                                        <div class="widget-body no-padding">
                                            <div class="table-responsive">
                                                <div class="msg_block"></div>
                                                <form class="smart-form" id="expense_entry_frm" method="post" action="">

                                                    <fieldset>
                                                        <div class="row">
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Date<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input type="hidden" class="voucherno" name="voucherno" value="">
                                                                    <input type="hidden" name="voucherlineid" class="voucherlineid" value="">
                                                                    <input name="date" class="date" id="edate" type="date" value="">
                                                                </label>
                                                            </section>
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    ExpenseHead<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="select">
                                                                    <select class="input-sm expense_head" name="expense_head">
                                                                        <option value="">Select Head</option>
                                                                        <?php
                                                                            foreach ($expense_head_list as $ehl)
                                                                            { ?>
                                                                                <option value="<?= $ehl->AccountName; ?>"><?= $ehl->AccountName; ?></option>
                                                                            <?php }
                                                                        ?>
                                                                    </select>
                                                                    <i></i>
                                                                </label>
                                                            </section>
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Amount<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="amount" placeholder="Amount" name="amount" type="text">
                                                                </label>
                                                            </section>
                                                            <section class="col col-3">
                                                                <label class="control-label">
                                                                    Narration<span class="alert">*</span>
                                                                </label>
                                                            </section>
                                                            <section class="col col-9">
                                                                <label class="input">
                                                                    <input class="narration" placeholder="Narration" name="narration" type="text" value="">
                                                                </label>
                                                            </section>
                                                        </div>
                                                    </fieldset>
                                                    <footer>
                                                        <button type="submit" class="btn btn-primary save_expense_entry">
                                                            Submit
                                                        </button>
                                                    </footer>
                                                </form>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </article>
                            <article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenLight jarviswidget-sortable" id="wid-id-3" data-widget-editbutton="false" role="widget">
                                    <header role="heading">

                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Expense List </h2>
                                    </header>

                                    <!-- widget div-->
                                    <div role="content">
                                        <div class="widget-body no-padding">

                                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th data-class="expand">#</th>
                                                        <th data-class="expand">Voucher No</th>
                                                        <th data-hide="phone"> Date</th>
                                                        <th data-hide="phone"> Expense Head</th>
                                                        <th data-hide="phone"> Amount</th>
                                                        <th data-class="expand">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $data['expense_list'] = $expense_list;
                                                        $this->load->view("expense_list_ajax_view",$data);                                                       
                                                    ?>                                                   
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </article>

                        </div>
                    </div>
                </div>
            </article>
        </div>

    </div>
</div>

<script>
    $(document).on("click",".save_expense_entry",function(e) {
        e.preventDefault();
        var date = $('.date').val();
        var expense_head = $('.expense_head').val();
        var amount = $('.amount').val();
        var narration = $('.narration').val();
        if(date && expense_head && amount && narration)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>accounts/expense_entry_save',
                type: 'POST',
                data: $('#expense_entry_frm').serialize(),
                success: function (response) {
                    //var responsetext = response.replace(/(\r\n|\n|\r)/gm,"");
                    if(response == true)
                    {        
                        var htm ='<div style="margin:10px;" class="alert alert-info alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Success!</strong> Successfully Inserted!';
                        htm +='</div>';
                        $('.msg_block').html(htm);
                        $('#expense_entry_frm')[0].reset();
                        
                        $("table tbody").load(base_url+"accounts/get_expense_list");
                    }
                    else
                    {
                        var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
                        htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
                        htm += '<strong>Warning!</strong> Something Wrong.';
                        htm +='</div>';
                        $('.msg_block').html(htm);
                    }
                }
            });
        }
        else
        {
            var htm ='<div style="margin:10px;" class="alert alert-warning  alert-dismissable">';
            htm += '<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
            htm += '<strong>Warning!</strong> Star(*) Marks field are required.';
            htm +='</div>';
            $('.msg_block').html(htm);
        }
    });
    
    $(document).on("click",".edit",function(e) {        
        var voucherno = $(this).attr("voucherno");
        var voucherlineid = $(this).attr("voucherlineid");
        var effectivedate = $(this).attr("effectivedate");
        var accountname = $(this).attr("accountname");
        var debit = $(this).attr("debit");
        var reference = $(this).attr("reference");
        //alert(effectivedate);
        $('.voucherno').val(voucherno);
        $('.voucherlineid').val(voucherlineid);
        //$('.date').val(effectivedate).toString();
        //$('.date').datepicker("setDate", new Date(effectivedate));
        //$( "#edate" ).val(effectivedate);
        //alert(effectivedate);
        document.getElementById("edate").valueAsDate = new Date(effectivedate);
        $('.expense_head').val(accountname).change();
        $('.amount').val(debit);
        $('.narration').val(reference);
        
    });
</script>