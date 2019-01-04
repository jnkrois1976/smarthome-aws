<div id="hubSelection">
    <div>
        <h2><span>Choose a Smart Hub </span></h2>
        <h2>
            <div id="hubActions" class="panelActions">
                <span id="hubSelectedItem"></span>
                <i class="material-icons md-dark md-48 selectedIcon" data-toggle="tooltip" data-placement="top" title="Selected">check</i>&nbsp;&nbsp; 
                <i class="material-icons md-dark md-48 clearIcon" data-toggle="tooltip" data-placement="top" title="Clear Selection" data-panel="hubSelectionContent">clear</i>
            </div>
            <i id="hubExpand" class="material-icons md-48 md-dark expandIcon disabled" data-action="collapse" data-panel="hubSelection" data-toggle="tooltip" data-placement="top" title="Collapse">remove</i>
        </h2>
    </div>
    <div id="hubSelectionContent" class="catPanel expanded">
        <?php if ($hubs):?>
            <?php $index = 1; ?>
			<?php foreach ($hubs as $hubs_row):?>
                <div id="hubCard<?=$index?>" class="card hubCard">
                    <img class="card-img-top" src="<?=$hubs_row->img_path?>" alt="<?=$hubs_row->name?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$hubs_row->name?></h5>
                        <p class="card-text">Turn your home into a smart home with a <?=$hubs_row->name?>. Connect wirelessly with a wide range of smart devices and make them work together</p>
                        <button class="btn btn-primary btn-lg btn-block selectCard" data-card="hubCard<?=$index?>" data-cards="hubCard" data-product="<?=$hubs_row->name?>" data-action="hubActions" data-panel="hubSelectionContent" data-expand="hubExpand" data-display="hubSelectedItem" data-nextpanel="voiceSelection">
                            <span>Select<span>ed</span></span> <i class="material-icons md-48">&nbsp;check</i>    
                        </button>
                    </div>
                    <div class="moreInfo">
                        <button class="btn btn-light btn-lg btn-block moreInfoBtn" data-expand="hubMoreInfo" data-panel="hubSelection">
                            <span></span>
                            <i class="material-icons md-48">keyboard_arrow_down</i>
                        </button>
                        <span>&nbsp;</span>
                    </div>
                </div>
                <?php $index++; ?>
            <?php endforeach; ?>
            <div id="hubMoreInfo" class="expandable"><span>Expanded</span></div>
        <?php elseif(!$hubs): ?>
            <h4>There are no hubs</h4>
        <?php endif; ?>
    </div>
</div>