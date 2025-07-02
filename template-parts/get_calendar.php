<?php
$data=$args;
?>
<style>
.table_calendar {
    border-collapse: separate;
    border-spacing: 0;
    border-width: 1px 0 0 1px;
    margin: 0 0 10px;
    table-layout: fixed;
    width: 100%;
    border: 1px solid #fff;
    padding: 0;
    margin: 0;
}

.table_calendar tr td {
    padding: 0;
    text-align: center;
}

.cal_name {
    font-size: 13px;
    font-weight: 700;
    line-height: 21pt;
    color: #fff;
    text-align: center;
    margin-bottom: 7px;
    background-color: #f7520a;
    margin-left: 2px;
    margin-right: 2px;
}

._day {
    line-height: 17px;
    background: #f5f5f5;
    color: #ed5001;
    font-size: 13px;
    font-weight: 500;
    text-align: left;
    padding-left: 4px;
}

.calendar_items a {
    text-decoration: none;
}
</style>
<div class="text-center py-4 calendar_content m-auto" style="max-width: 550px">
    <select name="travel" id="travel" class="form-select mb-2 formform-select-sm">
        <option value="6004" selected>short Inca Trail 2 Days</option>
    </select>
    <div class="d-flex align-items-center mb-3 justify-content-center ">
        <select name="mess" id="mes" class="form-select form-select-sm">
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04" selected>Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Deciembre</option>
        </select>
        <select name="anio" id="anio" class="form-select form-select-sm">
            <option value="2023" selected>2023</option>
            <option value="2024">2024</option>
        </select>
    </div>
    <div class="calendar" id="calendar">

    </div>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>


const mes = document.getElementById("mes");
const anio = document.getElementById("anio");
const calendar = document.getElementById("calendar");
const travel = document.getElementById("travel");

const data = {
    anio: anio.value,
    mes: mes.value,
    token: window.location.hostname,
    type: travel.value
};

const updateCalendar = () => {
    axios.post('https://calendar.glampingperutreks.com/calendar.php', data)
        .then(response => {
            calendar.innerHTML = response.data;
            window.initTooltip;
            console.log(window.initTooltip)
        });
};

const handleEvent = () => {
    data.mes = mes.value;
    data.anio = anio.value;
    data.type = travel.value;
    updateCalendar();
};

[mes, anio, travel].forEach(element => {
    element.addEventListener("change", handleEvent);
});

document.addEventListener('DOMContentLoaded', () => {
    updateCalendar();
});
</script>