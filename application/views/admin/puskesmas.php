<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-info icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Dashboard Posyandu</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Data Ibu Hamil</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?=$ibu?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Kunjungan Pemeriksaan</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?=$pemeriksaan?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Tanggal<?php
$tanggal = mktime(date('m'), date("d"), date('Y'));
date_default_timezone_set("Asia/Jakarta");
?></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><?=date("d-m-Y", $tanggal) . "</b>";?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                            Grafik Pendaftaran
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-eg-55">
                            <div class="widget-chart p-3">
                                <div style="height: 350px">
                                    <canvas id="line-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>