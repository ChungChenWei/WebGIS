function monthlyprice(fruitname){
    $("#monthly").empty();
    var flist = ['柳丁', '桃子', '芒果', '枇杷', '李子', '藍莓', '奇異果', '香蕉', '紅龍果', '文旦柚', '火龍果', '檸檬', '柿子', '百香果', '木瓜', '草莓', '柚子', '芭樂', '西瓜', '黃金果', '桑椹', '哈密瓜', '香瓜', '梅子', '金棗', '柑橘', '龍眼', '洛神', '荔枝', '酪梨', '蜜棗', '梨子', '葡萄', '釋迦', '鳳梨', '金桔', '番茄', '蓮霧', '無花果']
    if (!flist.includes(fruitname)){
        alert("adsjklhasdlkjhfaskljdg");
    };
    var margin = {top: 10, right: 30, bottom: 30, left: 60},
        width = 340 - margin.left - margin.right,
        height = 250 - margin.top - margin.bottom;
    var svg = d3.select("#monthly")
    .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
    .append("g")
        .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");
    d3.csv("fruit_monthlyaverage2.csv",
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
        .text("Price / KG (NT$)"); 
    
        svg.append("text")             
            .attr("transform",
                    "translate(" + (width/2) + " ," + 
                                (height + margin.top + 20) + ")")
            .style("text-anchor", "middle")
            .text("Month");    
        svg.append("path")
        .datum(data)
        .attr("fill", "none")
        .attr("stroke", "#1B4538")
        .attr("stroke-width", 3.5)
        .attr("d", d3.line()
            .x(function(d) { return x(d.month) })
            .y(function(d) { return y(d.value) })
            )

    })
}

function yearlyprice(fruitname){
    $("#overtime").empty();
    // fruitname = $("#fselect").val();
    var margin = {top: 10, right: 30, bottom: 30, left: 60},
        width = 340 - margin.left - margin.right,
        height = 250 - margin.top - margin.bottom;
    var svg = d3.select("#overtime")
    .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
    .append("g")
        .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");

            d3.csv("fruit_bymonth2.csv",
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
        .text("Price / KG (NT$)"); 
    
        svg.append("text")             
            .attr("transform",
                    "translate(" + (width/2) + " ," + 
                                (height + margin.top + 20) + ")")
            .style("text-anchor", "middle")
            .text("Month");    
        svg.append("path")
        .datum(data)
        .attr("fill", "none")
        .attr("stroke", "#1B4538")
        .attr("stroke-width", 3.5)
        .attr("d", d3.line()
            .x(function(d) { return x(d.month) })
            .y(function(d) { return y(d.value) })
            )
    })
}
