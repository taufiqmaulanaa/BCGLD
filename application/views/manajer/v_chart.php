<script src="<?php echo base_url();?>template/js/Chart.js"></script>
<div class="row">
<center>
<?php echo form_open('/manajer/vchart');?>
    <select name="tahun">
            <option value="">Pilih Tahun</option>
                <?php foreach ($Tampil_Tahun as $row) {?>
            <option value="<?php echo $row->Tahun; ?>">
                <?php echo $row->Tahun; ?>
            </option>
            <?php } ?>
    </select>
    <button>Search</button>
<?php echo form_close();?>
</center>
<center><canvas id="clients" width="1000" height="400"></canvas></center>
</div>

<script>
var barData = {
    labels: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    datasets: [
        {
            label: '2010 customers #',
            fillColor: '#382765',
            data: [<?php echo count($v_chart_januari)?>,<?php echo count($v_chart_februari)?>,<?php echo count($v_chart_maret)?>,<?php echo count($v_chart_april)?>,<?php echo count($v_chart_mei)?>,<?php echo count($v_chart_juni)?>,<?php echo count($v_chart_juli)?>,<?php echo count($v_chart_agustus)?>,<?php echo count($v_chart_september)?>,<?php echo count($v_chart_november)?>,<?php echo count($v_chart_desember)?>,]
        }
    ]
};

var context = document.getElementById('clients').getContext('2d');
var clientsChart = new Chart(context).Bar(barData);
</script>    
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="<?php echo base_url();?>template/bower_components/flot/excanvas.min.js"></script>
    <script src="<?php echo base_url();?>template//bower_components/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>template//bower_components/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>template//bower_components/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>template//bower_components/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url();?>template//bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url();?>template//js/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>template//dist/js/sb-admin-2.js"></script>

        <div id='container'></div>    
    
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>