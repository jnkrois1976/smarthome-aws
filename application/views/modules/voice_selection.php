<div id="voiceSelection">
    <div>
        <h2>Choose a Voice Assistant</h2>
        <h2>
            <div id="voiceActions" class="panelActions">
                <span id="voiceSelectedItem"></span>
                <i class="material-icons md-48 md-dark selectedIcon" data-toggle="tooltip" data-placement="top" title="Selected">check</i>&nbsp;&nbsp; 
                <i class="material-icons md-48 md-dark clearIcon" data-toggle="tooltip" data-placement="top" title="Clear Selection" data-panel="voiceSelectionContent">clear</i>
            </div>
            <i id="voiceExpand" class="material-icons md-48 md-dark expandIcon disabled" data-action="expand" data-panel="voiceSelection" data-toggle="tooltip" data-placement="top" title="Expand">add</i>
        </h2>
    </div>
    <div id="voiceSelectionContent" class="catPanel">
        <?php if ($voice_assistants):?>
            <?php $index = 1; ?>
			<?php foreach ($voice_assistants as $voice_assistants_row):?>
                <div id="voiceCard<?=$index?>" class="card voiceCard">
                    <img class="card-img-top" src="<?=$voice_assistants_row->img_path?>" alt="<?=$voice_assistants_row->name?>">
                    <div class="card-body">
                        <h5 class="card-title"><?=$voice_assistants_row->name?></h5>
                        <p class="card-text">Turn your home into a smart home with a <?=$voice_assistants_row->name?>. Connect wirelessly with a wide range of smart devices and make them work together</p>
                        <button class="btn btn-primary btn-lg btn-block selectCard" data-card="voiceCard<?=$index?>" data-cards="voiceCard" data-product="<?=$voice_assistants_row->name?>" data-action="voiceActions"  data-panel="voiceSelectionContent" data-expand="voiceExpand" data-display="voiceSelectedItem" data-nextpanel="devicesSelection">
                            <span>Select<span>ed</span></span> <i class="material-icons md-48">&nbsp;check</i>    
                        </button>
                    </div>
                    <div class="moreInfo">
                        <button class="btn btn-light btn-lg btn-block moreInfoBtn" data-expand="voiceMoreInfo" data-panel="voiceSelection">
                            <span></span>
                            <i class="material-icons md-48">keyboard_arrow_down</i>
                        </button>
                        <span>&nbsp;</span>
                    </div>
                </div>
                <?php $index++; ?>
            <?php endforeach; ?>
            <div id="voiceMoreInfo" class="expandable"><span>Expanded</span></div>
        <?php elseif(!$voice_assistants): ?>
            <h4>There are no hubs</h4>
        <?php endif; ?>
    </div>
</div>