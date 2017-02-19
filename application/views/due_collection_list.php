
<div id="main" role="main">

    <div id="ribbon">

        <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span> 
        </span>

        <ol class="breadcrumb">
            <li>Home</li><li>Due Collection List</li>
        </ol>
    </div>
    <div id="content">
        <div class="row">

            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

                <div class="jarviswidget jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">

                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Due Collection List</h2>
                    </header>

                    <div role="content">                            
                        <div class="row">                            
                            <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
                                <div class="jarviswidget jarviswidget-color-greenLight jarviswidget-sortable" id="wid-id-3" data-widget-editbutton="false" role="widget">
                                    <header role="heading">
                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Due Collection List </h2>
                                        <h2 style="float: right; margin-right: 20px;">
                                            <a target="_blank" href="<?php echo base_url().'report/due_collection_pdf'; ?>"><i class="fa fa-print" style="color:blue;"></i></a>
                                        </h2>
                                    </header>

                                    <!-- widget div-->
                                    <div role="content">
                                        <div class="widget-body no-padding">

                                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th data-class="expand">#</th>
                                                        <th data-class="expand">Patient Name</th>
                                                        <th data-hide="phone"> Address/Phone</th>
                                                        <th data-class="expand">Doctors Name</th>
                                                        <th data-class="expand">Ref. Name</th>
                                                        <th data-class="expand">Created Date</th>
                                                        <th data-class="expand">Delivery Date</th>
                                                        <th data-class="expand">Total Amount</th>
                                                        <th data-class="expand">Paid</th>
                                                        <th data-class="expand">Due</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $sl = 1;
                                                        foreach ($due_collection_sql as $row)                                                            
                                                        {                                                            
                                                        ?>
                                                    <tr>
                                                            <td><?php echo $sl; ?></td>
                                                            <td><?php echo $row->patient_name; ?></td>
                                                            <td><?php echo $row->address_phone; ?></td>
                                                            <td><?php echo $row->name; ?></td>
                                                            <td><?php echo $row->ref_name; ?></td>
                                                            <td><?php echo $row->created; ?></td>
                                                            <td><?php echo $row->delivery_date; ?></td>
                                                            <td><?php echo $row->total_price; ?></td>
                                                            <td><?php echo $row->total_paid; ?></td>
                                                            <td><?php echo $row->due; ?></td>
                                                    </tr>
                                                        <?php $sl++; }
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

