<div id="devicesSelection">
    <div>
        <h2>Choose Smart Home Devices</h2>
        <h2>
            <div id="deviceActions" class="panelActions">
                <i class="material-icons md-48 md-dark clearIcon" data-toggle="tooltip" data-placement="top" title="Clear All Selections" data-panel="devicesSelectionContent">clear</i>
            </div>
            <i id="devicesExpand" class="devices material-icons md-48 md-dark expandIcon disabled" data-action="expand" data-panel="devicesSelection"  data-toggle="tooltip" data-placement="top" title="Expand">add</i>
        </h2>
    </div>
    <div class="catPanel">
        <h4>Filter by category</h4>
    </div>
    <div class="sortIcons catPanel">
        <svg class="icon-bulb" data-toggle="tooltip"data-placement="top" title="Smart Lightbulbs">
            <use xlink:href="/svg/lightBulb.svg#icon-bulb"></use>
        </svg>
        <svg class="icon-outlet-icon" data-toggle="tooltip"data-placement="top" title="Smart Outlets">
            <use xlink:href="/svg/outlet-icon.svg#icon-outlet-icon"></use>
        </svg>
        <svg class="icon-plug-icon" data-toggle="tooltip"data-placement="top" title="Smart Plugs">
            <use xlink:href="/svg/plug-icon.svg#icon-plug-icon"></use>
        </svg>
        <svg class="icon-light-switch-icon" data-toggle="tooltip"data-placement="top" title="Smart Light Switches">
            <use xlink:href="/svg/light-switch-icon.svg#icon-light-switch-icon"></use>
        </svg>
        <svg class="icon-thermostat-icon" data-toggle="tooltip"data-placement="top" title="Smart Thermostats">
            <use xlink:href="/svg/thermostat-icon.svg#icon-thermostat-icon"></use>
        </svg>
        <svg class="icon-smart-lock-icon" data-toggle="tooltip"data-placement="top" title="Smart Locks">
            <use xlink:href="/svg/smart-lock-icon.svg#icon-smart-lock-icon"></use>
        </svg>
        <svg class="icon-security-icon" data-toggle="tooltip"data-placement="top" title="Smart Security Devices">
            <use xlink:href="/svg/security-icon.svg#icon-security-icon"></use>
        </svg>
        <svg class="icon-more-icon" data-toggle="tooltip"data-placement="top" title="Other Smart Devices">
            <use xlink:href="/svg/more-icon.svg#icon-more-icon"></use>
        </svg>
    </div>
    <div class="catPanel">
        <h4>Smart Home Products</h4>
    </div>
    <div id="devicesSelectionContent" class="catPanel">
        <?php for($i = 1, $c = 6; $i <= 18; $i++, $c): ?>
            <?php 
                if($i % 6 / 6 != 0){
                    $panel = $c;
                } else if($i % 6 / 6 == 0) {
                    $panel = $i;
                }
            ?>
            <div id="deviceCard<?=$i?>" class="card deviceCard">
                <img class="card-img-top" src="/dist/img/smartthings-logo-2018.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Samsung SmartThings</h5>
                    <p class="card-text">Turn your home into a smart home with a SmartThings Hub. Connect wirelessly with a wide range of smart devices and make them work together</p>
                    <button class="btn btn-primary btn-lg btn-block selectCard" data-card="deviceCard<?=$i?>" data-cards="deviceCard" data-product="" data-action="deviceActions" data-panel="devicesSelectionContent" data-expand="devicesExpand"  data-display="" data-nextpanel="">
                        <span>Select<span>ed</span></span> <i class="material-icons md-48">&nbsp;check</i>    
                    </button>
                </div>
                <div class="moreInfo">
                    <button class="btn btn-light btn-lg btn-block moreInfoBtn" data-expand="devicesMoreInfo<?=$panel?>" data-panel="devicesSelection" data-row="row<?=$panel?>">
                        <span></span>
                        <i class="material-icons md-48">keyboard_arrow_down</i>
                    </button>
                    <span>&nbsp;</span>
                </div>
            </div>
            <?php if($i % 6 / 6 == 0): ?>
                <?php $c += 6; ?>
                <div id="devicesMoreInfo<?=$i?>" class="expandable"><span>Expanded</span></div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</div>