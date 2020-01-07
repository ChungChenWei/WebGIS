function monthlyprice(){
    $("#monthly").empty();
    fruitname = $("#fselect").val();
    var margin = {top: 10, right: 30, bottom: 30, left: 60},
        width = 460 - margin.left - margin.right,
        height = 300 - margin.top - margin.bottom;
    var svg = d3.select("#monthly")
    .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
    .append("g")
        .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");
    d3.csv("fruit_monthlyaverage.csv",
    function(d){
        return { month : d3.timeParse("%m")(d.mon), value : d[fruitname]}
    },
    function(data) {
        var x = d3.scaleTime()
        .domain(d3.extent(data, function(d) { return d.month; }))
        .range([ 0, width ]);
        svg.append("g")
        .attr("transform", "translate(0," + (height) + ")")
        .call(d3.axisBottom(x))
        .selectAll("text")
            .attr("x", -15)
            .attr("transform", "rotate(30)")
            .style("text-anchor", "start");
        var y = d3.scaleLinear()
        .domain([0, d3.max(data, function(d) { return +d.value; })])
        .range([ height, 0 ]);
        svg.append("g")
        .call(d3.axisLeft(y));

        svg.append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 0 - margin.left)
        .attr("x",0 - (height / 2))
        .attr("dy", "1em")
        .style("text-anchor", "middle")
        .text("Price (NT$)"); 
    
        svg.append("text")             
            .attr("transform",
                    "translate(" + (width/2) + " ," + 
                                (height + margin.top + 20) + ")")
            .style("text-anchor", "middle")
            .text("Month");    
        svg.append("path")
        .datum(data)
        .attr("fill", "none")
        .attr("stroke", "black")
        .attr("stroke-width", 3.5)
        .attr("d", d3.line()
            .x(function(d) { return x(d.month) })
            .y(function(d) { return y(d.value) })
            )

    })
}

function yearlyprice(){
    $("#overtime").empty();
    fruitname = $("#fselect").val();
    var margin = {top: 10, right: 30, bottom: 30, left: 60},
        width = 460 - margin.left - margin.right,
        height = 300 - margin.top - margin.bottom;
    var svg = d3.select("#overtime")
    .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
    .append("g")
        .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");

            d3.csv("fruit_bymonth_test.csv",
    function(d){
        return { month : d3.timeParse("%Y%m")(d.monday), value : d[fruitname]}
    },
    function(data) {
        var x = d3.scaleTime()
        .domain(d3.extent(data, function(d) { return d.month; }))
        .range([ 0, width ]);
        svg.append("g")
        .attr("transform", "translate(0," + (height) + ")")
        .call(d3.axisBottom(x))
        .selectAll("text")
            .attr("x", -15)
            .attr("transform", "rotate(30)")
            .style("text-anchor", "start");

            var y = d3.scaleLinear()
        .domain([0, d3.max(data, function(d) { return +d.value; })])
        .range([ height, 0 ]);
        svg.append("g")
        .call(d3.axisLeft(y));

        svg.append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 0 - margin.left)
        .attr("x",0 - (height / 2))
        .attr("dy", "1em")
        .style("text-anchor", "middle")
        .text("Price (NT$)"); 
    
        svg.append("text")             
            .attr("transform",
                    "translate(" + (width/2) + " ," + 
                                (height + margin.top + 20) + ")")
            .style("text-anchor", "middle")
            .text("Month");    
        svg.append("path")
        .datum(data)
        .attr("fill", "none")
        .attr("stroke", "black")
        .attr("stroke-width", 3.5)
        .attr("d", d3.line()
            .x(function(d) { return x(d.month) })
            .y(function(d) { return y(d.value) })
            )
    })
}

$(document).ready(function(){
    $("button#getprice").click(function(){
        monthlyprice();
        yearlyprice();
    });
});