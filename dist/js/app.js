var APP = APP || {};

APP.config = {
    flags: {
        myFlag: true 
    }
};

APP.domElems = {
    tooltip: document.getElementById('tooltip') || null,
    withToolTip: document.getElementsByClassName('withToolTip') || null,
    moreInfoBtn: document.getElementsByClassName('moreInfoBtn') || null,
    expandable: document.getElementsByClassName('expandable') || null,
    selectCard: document.getElementsByClassName('selectCard') || null,
    expandIcon: document.getElementsByClassName('expandIcon') || null,
    clearIcon: document.getElementsByClassName('clearIcon') || null
};

APP.helpers = {
    tooltipHelper: function($){
        $(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });
    },
    addRemoveClass: function(elem, cssClass, action){
        switch (action) {
            case 'add':
                elem.classList.add(cssClass);
                break;
            case 'remove':
                elem.classList.remove(cssClass);
                break;
            case 'contains':
                return elem.classList.contains(cssClass);
            case 'toggle':
                elem.classList.toggle(cssClass);
                break;
            default:
                console.log('addRemoveClass helper failed');
        }
    },
    handleAttribute: function(elem, method, attr, newVal){
        switch (method) {
            case 'has':
                return elem.hasAttribute(attr);
            case 'get':
                return elem.getAttribute(attr);
            case 'set':
                elem.setAttribute(attr, newVal);
                break;
            case 'remove':
                elem.removeAttribute(attr);
                break;
            default:
                console.log('handleAttribute helper failed');
        }
    }
};

APP.methods = {
    displayTooltip: function(event){
        var elem = event.currentTarget,
            elemCoords = elem.getBoundingClientRect(),
            width = parseInt(elemCoords.width, 0),
            height = parseInt(elemCoords.height, 0),
            topCoord = parseInt(elemCoords.top, 0),
            rightCoord = parseInt(elemCoords.right, 0),
            leftCoord = parseInt(elemCoords.left, 0),
            placement = elem.dataset.placement,
            tooltipClass = "",
            coordString = "";
        switch (placement) {
            case 'topRight':
                var calcTop = topCoord + height - 132,
                    calcRight = rightCoord,
                    coordString = "top: " + calcTop + "px; left: " + calcRight + "px;",
                    tooltipClass = "tooltipRight";
                break;
            case 'bottomRight':
                var calcTop = topCoord,
                    calcRight = rightCoord,
                    coordString = "top: " + calcTop + "px; left: " + calcRight + "px;",
                    tooltipClass = "tooltipRight";
                break;
            case 'topLeft':
                var calcTop = topCoord + height - 132,
                    calcLeft = leftCoord - width - 70,
                    coordString = "top: " + calcTop + "px; left: " + calcLeft + "px;",
                    tooltipClass = "tooltipLeft";
                break;
            case 'bottomLeft':
                var calcTop = topCoord,
                    calcLeft = leftCoord - width - 70,
                    coordString = "top: " + calcTop + "px; left: " + calcLeft + "px;",
                    tooltipClass = "tooltipLeft";
                break;
            case 'center':
                var calcTop = topCoord + height + 20,
                    calcLeft = leftCoord,
                    coordString = "top: " + calcTop + "px; left: " + calcLeft + "px;",
                    tooltipClass = "tooltipBottom";
                break;
            default:
                console.log('default');
        }
        APP.domElems.tooltip.innerText = elem.dataset.tooltip;
        APP.domElems.tooltip.className="";
        APP.helpers.addRemoveClass(APP.domElems.tooltip, tooltipClass, 'add');
        APP.domElems.tooltip.setAttribute("style", "display: block; opacity: 1; " + coordString);
    },
    hideTooltip: function(event){
        APP.domElems.tooltip.setAttribute("style", "display: none; opacity: 0");
    },
    displayMoreInfoTab: function(event){
        var elem = event.currentTarget,
            panel = elem.dataset.panel,
            expand = elem.dataset.expand,
            row = elem.dataset.row || null,
            infoBtns = (row != null)? document.querySelectorAll("#"+ panel + " .moreInfoBtn[data-row="+row+"]"): document.querySelectorAll('#'+panel+' .moreInfoBtn'),
            i = 0;
        if(APP.helpers.addRemoveClass(elem, 'active', 'contains')){
            APP.helpers.addRemoveClass(elem, 'active', 'remove');
            APP.helpers.addRemoveClass(document.getElementById(expand), 'expanded', 'remove');
        }else{
            for(i; i < infoBtns.length; i++){
                APP.helpers.addRemoveClass(infoBtns[i], 'active', 'remove');
            }
            APP.helpers.addRemoveClass(elem, 'active', 'add');
            APP.helpers.addRemoveClass(document.getElementById(expand), 'expanded', 'add');
        }    
    },
    clearSelectedCard: function(elem){
        if(elem.dataset.panel != 'devicesSelectionContent'){
            var cardsInPanel = document.getElementsByClassName(elem.dataset.cards) || null;
            for(var i = 0; i < cardsInPanel.length; i++){
                if(cardsInPanel[i].id != elem.dataset.card){
                    APP.helpers.addRemoveClass(cardsInPanel[i], 'selected', 'remove');
                }
            }
        }else{
            APP.helpers.addRemoveClass(elem, 'selected', 'remove');
        }
    },
    selectCard: function(event){
        var elem = event.currentTarget,
            card= document.getElementById(elem.dataset.card) || null,
            actions = document.getElementById(elem.dataset.action) || null,
            expandIcon = document.getElementById(elem.dataset.expand) || null,
            productName = document.getElementById(elem.dataset.display) || null;
        APP.methods.clearSelectedCard(elem);
        if(APP.helpers.addRemoveClass(card, 'selected', 'contains')){
            APP.helpers.addRemoveClass(card, 'selected', 'toggle');
            if(elem.dataset.panel != 'devicesSelectionContent'){
                APP.helpers.addRemoveClass(actions, 'active', 'remove');
            }else if(document.querySelectorAll('#'+elem.dataset.panel + ' .card.selected').length == 0){
                APP.helpers.addRemoveClass(actions, 'active', 'remove');
            }
        }else{
            APP.helpers.addRemoveClass(card, 'selected', 'add');
            APP.helpers.addRemoveClass(actions, 'active', 'add');
        }
        if(productName != null){
            productName.textContent = elem.dataset.product;
        }
        APP.helpers.addRemoveClass(expandIcon, 'disabled', 'remove');
        try{
            if(elem.dataset.nextpanel != ""){
                APP.methods.expandNextPanel(elem.dataset.nextpanel);
                document.getElementById(elem.dataset.nextpanel).scrollIntoView({behavior: "smooth", block: "start"});
            }else{
                throw new Error("Last panel is already expanded");
            }
        }catch(error){
            console.log(error.message);
        }
    },
    clearSelection: function(event){
        var elem = event.currentTarget,
            cardsInPanel = document.querySelectorAll('#'+elem.dataset.panel+' .card') || null,
            i = 0;
        for(i; i < cardsInPanel.length; i++){
            APP.helpers.addRemoveClass(cardsInPanel[i], 'selected', 'remove');
        }
        APP.helpers.addRemoveClass(elem.parentElement, 'active', 'remove');
    },
    expandCollapsePanel: function(event){
        var elem = event.currentTarget,
            action = elem.dataset.action,
            panel = document.querySelectorAll('#'+elem.dataset.panel+' .catPanel') || null,
            i = 0;
        if(action === 'collapse' && !APP.helpers.addRemoveClass(elem, "disabled", "contains")){
            elem.textContent = "add";
            for(i; i < panel.length; i++){
                APP.helpers.addRemoveClass(panel[i], 'expanded', 'toggle');
            }
            APP.helpers.handleAttribute(elem, 'set', 'data-action', 'expand');
            APP.helpers.handleAttribute(elem, 'set', 'data-original-title', 'Expand');
        }else if(!APP.helpers.addRemoveClass(elem, "disabled", "contains")){
            elem.textContent = "remove";
            for(i; i < panel.length; i++){
                APP.helpers.addRemoveClass(panel[i], 'expanded', 'toggle');
            }
            APP.helpers.handleAttribute(elem, 'set', 'data-action', 'collapse');
            APP.helpers.handleAttribute(elem, 'set', 'data-original-title', 'Collapse');
        }
    },
    expandNextPanel: function(nextPanelId){
        var nextPanel = document.querySelectorAll('#'+nextPanelId+' .catPanel') || null,
            expandIcon = document.querySelector('#'+nextPanelId+' .expandIcon') || null,
            i = 0;
        for(i; i < nextPanel.length; i++){
            APP.helpers.addRemoveClass(nextPanel[i], 'expanded', 'add');
        }
        expandIcon.textContent = "remove";
        APP.helpers.handleAttribute(expandIcon, 'set', 'data-action', 'collapse');
        APP.helpers.handleAttribute(expandIcon, 'set', 'data-original-title', 'Collapse');
        APP.helpers.addRemoveClass(expandIcon, 'disabled', 'remove');
    }
};

APP.model = {
    myNewModel: {
        "myKey": "myValue",
        "myOtherKey": "myOtherValue"
    }
};

APP.events = {
    tooltipEvent: function(){
        try{
            if(APP.domElems.tooltip !== null){
                var arrayElems = APP.domElems.withToolTip, arrayElem;
                for (var i = 0; i < arrayElems.length; i++) {
                    arrayElem = arrayElems[i];
                    arrayElem.addEventListener("mouseover", APP.methods.displayTooltip, false);
                    arrayElem.addEventListener("mouseout", APP.methods.hideTooltip, false);
                }
            }else{
                throw new Error("Tooltip element not available");
            }
        }catch(error){
            console.log(error.message);
        }
    },
    moreInfoTabEvent: function(){
        try{
            if(APP.domElems.moreInfoBtn !== null){
                var arrayElems = APP.domElems.moreInfoBtn, arrayElem;
                for (var i = 0; i < arrayElems.length; i++) {
                    arrayElem = arrayElems[i];
                    arrayElem.addEventListener("click", APP.methods.displayMoreInfoTab, false);
                }
            }else{
                throw new Error('more info links not available');
            }
        }catch(error){
            console.log(error.message);
        }
    },
    selectCardEvent: function(){
        try{
            if(APP.domElems.selectCard !== null){
                var arrayElems = APP.domElems.selectCard, arrayElem;
                for (var i = 0; i < arrayElems.length; i++) {
                    arrayElem = arrayElems[i];
                    arrayElem.addEventListener("click", APP.methods.selectCard, false);
                }
            }else{
                throw new Error('select cards are not present in the DOM');
            }
        }catch(error){
            console.log(error.message);
        }
    },
    clearSelectionEvent: function(){
        try{
            if(APP.domElems.clearIcon !== null){
                var arrayElems = APP.domElems.clearIcon, arrayElem;
                for (var i = 0; i < arrayElems.length; i++) {
                    arrayElem = arrayElems[i];
                    arrayElem.addEventListener("click", APP.methods.clearSelection, false);
                }
            }else{
                throw new Error('clear selection icon not available');
            }
        }catch(error){
            console.log(error.message);
        }
    },
    expandIconEvent: function($){
        try{
            if(APP.domElems.expandIcon !== null){
                var arrayElems = APP.domElems.expandIcon, arrayElem;
                for (var i = 0; i < arrayElems.length; i++) {
                    arrayElem = arrayElems[i];
                    arrayElem.addEventListener("click", APP.methods.expandCollapsePanel, false);
                }
            }else{
                throw new Error('collapse/expand icon not available')
            }
        }catch(error){
            console.log(error.message);
        }
    },
    init: function () {
        console.log("APP init started");
        this.tooltipEvent();
        this.moreInfoTabEvent();
        this.selectCardEvent();
        this.expandIconEvent();
        APP.helpers.tooltipHelper(jQuery);
        this.clearSelectionEvent();
        console.log("APP init finshed");
    }
};

APP.events.init();