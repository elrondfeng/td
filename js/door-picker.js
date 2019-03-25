'use strict';

function Viewmodel() {
    var self = this;
    self.doors = ko.observableArray([]);
    self.doorPlace = ko.observable('');
    self.doorSize = ko.observable('');

    self.isAgent = ko.observable(false);
    self.priceBreakdown = ko.observable('');
    self.pgid = ko.observable(0);

    self.priceBreakdownFormatted = ko.computed(function (){
        var a = self.priceBreakdown().split('|');
        a.unshift("pgid: "+self.pgid());

        a = a.map(function(e) {return e.trim()});

        return a.join('\n');
    });

    self.MinHeight = function () {
        var doors = ko.toJS(self.doors);
        if (doors.length < 1) return 10;
        var h = doors.map(function (door) {
            return door.totalHeight;
        });
        // return Math.max(...h);
        return h.reduce(function (a, b) {
            return Math.max(a, b);
        });
    };

    self.MinWidth = function () {
        var doors = ko.toJS(self.doors);
        var w = doors.filter(function (door) {
            return door.type == "end";
        });
        if (w.length < 1) return 10;

        var frontWidth = 0;
        var backWidth = 0;

        // sum front doors
        var f = w.filter(function (door) {
            return door.place == "FRONT";
        });
        if (f.length > 0) {
            f = f.map(function (door) {
                return door.width;
            });
            frontWidth = f.reduce(function (total, doorWidth) {
                return total + doorWidth;
            }) + f.length * 2;
        }

        // ..and back doors
        var b = w.filter(function (door) {
            return door.place == "BACK";
        });
        if (b.length > 0) {
            b = b.map(function (door) {
                return door.width;
            });
            backWidth = b.reduce(function (total, doorWidth) {
                return total + doorWidth;
            }) + b.length * 2;
        }

        return Math.max(frontWidth, backWidth);
    };

    self.MinLength = function () {
        var doors = ko.toJS(self.doors);
        var w = doors.filter(function (door) {
            return door.type == "side";
        });
        if (w.length < 1) return 5;

        var leftLength = 0;
        var rightLength = 0;

        // sum right doors
        var f = w.filter(function (door) {
            return door.place == "LEFT";
        });
        if (f.length > 0) {
            f = f.map(function (door) {
                return door.width;
            });
            leftLength = f.reduce(function (total, doorWidth) {
                return total + doorWidth;
            }) + f.length * 2;
        }

        // ..and left doors
        var b = w.filter(function (door) {
            return door.place == "RIGHT";
        });
        if (b.length > 0) {
            b = b.map(function (door) {
                return door.width;
            });
            rightLength = b.reduce(function (total, doorWidth) {
                return total + doorWidth;
            }) + b.length * 2;
        }

        return Math.max(leftLength, rightLength);
    };

    self.minSize = {
        width: ko.computed(self.MinWidth),
        height: ko.computed(self.MinHeight),
        length: ko.computed(self.MinLength)
    };
}

function Door(d) {
    var d = d || {};
    var self = this;

    self.place = d.place || "";
    self.size = d.size || "";

    self.height = ko.computed(function () {
        return parseInt(self.size.split("x")[1]);
    });

    self.width = ko.computed(function () {
        return parseInt(self.size.split("x")[0]);
    });

    self.type = ko.computed(function () {
        return self.place == "FRONT" || self.place == "BACK" ? "end" : "side";
    });

    self.totalHeight = ko.computed(function () {
        return self.height() + (self.type() == "end" ? 1 : 2);
    });
}

function AddDoor() {
    var d = new Door({ place: vm.doorPlace(), size: vm.doorSize() });

    vm.doors.push(d);

    // check to make sure we dont exceed max structural boundaries
    if (vm.minSize.width() > 30) {
        vm.doors.remove(d);
        $.colorbox({ width: "600px", html: "<h6 class=\"style4\">Adding this door would exceed the maximum width available online. Buildings are available up to 60' wide, 20' tall, and virtually any length. Please call 855-227-7678 for free consultation.</h6>" });
    }
    if (vm.minSize.length() > 51) {
        vm.doors.remove(d);
        $.colorbox({ width: "600px", html: "<h6 class=\"style4\">Adding this door would exceed the maximum length available online. Buildings are available up to 60' wide, 20' tall, and virtually any length. Please call 855-227-7678 for free consultation.</h6>" });
    }
    SyncDoorInputs();
    EnforceMin();
    EnforceWalls();
    updatePricing();
}

function RemoveDoor(d) {
    vm.doors.remove(d);
    SyncDoorInputs();
    updatePricing();
}

function EnforceMin() {
    var min = ko.toJS(vm.minSize);
    var changed = false;

    if ($("#width").val() < min.width) {
        $("#width").val(min.width);
        $("#slider_width").slider({ value: min.width });
        $("#summaryWidth").html(min.width);
        changed = true;
    };
    if ($("#height").val() < min.height) {
        $("#height").val(min.height);
        $("#slider_height").slider({ value: min.height });
        $("#summaryHeight").html(min.height);
        changed = true;
    };
    if ($("#length").val() < min.length) {
        $("#length").val(min.length);
        $("#slider_length").slider({ value: min.length });
        $("#summaryLength").html(min.length);
        changed = true;
    };

    if (changed) $.colorbox({ width: "600px", html: '<h6 class="style4">BUILD CHANGE /// In order to accomodate your selection, the building has been resized.</h6>' });
}

function EnforceWalls() {
    var doors = ko.toJS(vm.doors);

    var f = doors.filter(function (door) {
        return door.place == "FRONT";
    }).length;
    var b = doors.filter(function (door) {
        return door.place == "BACK";
    }).length;
    var s = doors.filter(function (door) {
        return door.type == "side";
    }).length;

    if (f > 0 && !$("#f-endsclosed:checked").val()) {
        $("#f-endsclosed").click();
        $.colorbox({ width: "600px", html: '<h6 class="style4">BUILD CHANGE /// In order to accomodate your selection, front walls have been added.</h6>' });
    }
    if (b > 0 && !$("#b-endsclosed:checked").val()) {
        $("#b-endsclosed").click();
        $.colorbox({ width: "600px", html: '<h6 class="style4">BUILD CHANGE /// In order to accomodate your selection, back walls have been added.</h6>' });
    }
    if (s > 0 && !$("#sidesclosed:checked").val()) {
        $("#sidesclosed").click();
        $.colorbox({ width: "600px", html: '<h6 class="style4">BUILD CHANGE /// In order to accomodate your selection, side walls have been added.</h6>' });
    }
}

function SyncDoorInputs() {
    // garagedoorsize6w7h-f
    var doors = ko.toJS(vm.doors);

    $(".old-door-ui input").spinner("value", 0);

    doors.forEach(function (door) {
        var s = "garagedoorsize" + door.width + "w" + door.height + "h-" + door.place[0].toLowerCase();

        var v = $("#" + s).spinner("value");
        $("#" + s).spinner("value", v + 1);
    });

    $(".old-door-ui input").trigger("change");
}

// garagedoorsize6w7h-f

var viewmodel = new Viewmodel();
var vm = viewmodel;

function BindDoors() {
    ko.applyBindings(viewmodel);
}

function RemoveDoorSet(place) {
    var removeSet = vm.doors().filter(function (door) {
        return door.place == place;
    });
    removeSet.forEach(function (door) {
        vm.doors.remove(door);
    });
}

function VerifyBuildId(bid) {
    var old = bid;
    // var bid = $("#buildID").html()
    bid = bid.split("-");
    // var doorSets = bid[1].match(/.{1,4}/g);

    var doorSets = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
    var winInfo = bid[1].substring(bid[1].length - 8, bid[1].length);

    var doors = ko.toJS(vm.doors);
    var sizes = ["6x7", "8x7", "9x7", "10x8", "10x10"];
    var places = ["FRONT", "BACK", "LEFT", "RIGHT"];

    doors.forEach(function (door) {
        var doorSetId = sizes.indexOf(door.size);
        var placeId = places.indexOf(door.place);

        doorSets[doorSetId][placeId] += 1;
    });

    bid[1] = doorSets.join("").replace(/,/g, '');
    bid[1] += winInfo;
    bid = bid.join("-");

    // console.log(old);
    // console.log(bid);

    return bid;
}

function GetDoorSetId(d) {}

function ParseDoor(b, n) {
    var loc = b[b.length - 1];
    var d = b.substring(14, b.length - 2);
    console.log(d);
    d = d.substring(0, d.length - 1);

    d = d.split("w");


    var w = d[0];
    var h = d[1];

    if(!h) return;

    var size = w + "x" + h;

    var place = "";

    switch (loc) {
        case "f":
            place = "FRONT";
            break;
        case "b":
            place = "BACK";
            break;
        case "l":
            place = "LEFT";
            break;
        case "r":
            place = "RIGHT";
            break;
    }

    var door = new Door({place: place, size: size});
    console.log(door);
    // console.log(n);

    for (var i = 0; i < n; i++) {
        vm.doors.push(new Door({ place: place, size: size }));
    }
}

// ui binding
$("#sideshalfbottom,#sideshalftop,#sidesnowalls").on("click", function () {
    RemoveDoorSet("LEFT");
    RemoveDoorSet("RIGHT");
});
// remove all side walls

$("#f-endsgable,#f-endsnowalls").on("click", function () {
    RemoveDoorSet("FRONT");
});
$("#b-endsgable,#b-endsnowalls").on("click", function () {
    RemoveDoorSet("BACK");
});