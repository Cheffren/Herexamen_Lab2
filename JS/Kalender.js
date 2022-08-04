var cal = {
    //INIT CALENDAR
    hMth:null, hYr:null, // MONTH & YEAR
    hWrap:null, // DAYS WRAPPER
    // EVENT FORM
    hBlock:null, hForm:null, hFormDel:null, hFormCX:null,
    hID:null, hStart:null, hEnd:null, hTxt:null, hColor:null,
    init : () => {
      //GET HTML ELEMENTS
      cal.hMth = document.querySelector("#calmonth");
      cal.hYr = document.querySelector("#calyear");
      cal.hWrap = document.querySelector("#calwrap");
      cal.hBlock = document.querySelector("#calblock");
      cal.hForm = document.querySelector("#calform");
      cal.hFormDel = document.querySelector("#calformdel");
      cal.hFormCX = document.querySelector("#calformcx");
      cal.hID = document.querySelector("#evtid");
      cal.hStart = document.querySelector("#evtstart");
      cal.hEnd = document.querySelector("#evtend");
      cal.hTxt = document.querySelector("#evttxt");
      cal.hColor = document.querySelector("#evtcolor");
  
      //ATTACH CONTROLS
      cal.hMth.onchange = cal.draw;
      cal.hYr.onchange = cal.draw;
      cal.hForm.onsubmit = cal.save;
      cal.hFormDel.onclick = cal.del;
      cal.hFormCX.onclick = cal.hide;
  
      //DRAW CURRENT MONTH/YEAR
      cal.draw();
    },
  
    //SUPPORT FUNCTION - AJAX FETCH
    ajax : (data, load) => {
      fetch("./ajax/KalenderAjax.php", { method:"POST", body:data })
      .then(res=>res.text()).then(load);
    },
  
    //DRAW CALENDAR
    draw : () => {
      //FORM DATA
      let data = new FormData();
      data.append("req", "draw");
      data.append("month", cal.hMth.value);
      data.append("year", cal.hYr.value);
      //AJAX LOAD SELECTED MONTH
      cal.ajax(data, (res) => {
        //ATTACH CALENDAR TO WRAPPER
        cal.hWrap.innerHTML = res;
  
        //CLICK DAY CELLS TO ADD EVENT
        for (let day of cal.hWrap.getElementsByClassName("day")) {
          day.onclick = () => { cal.show(day); };
        }
  
        // (C2-3) CLICK EVENT TO EDIT
        for (let evt of cal.hWrap.getElementsByClassName("calevt")) {
          evt.onclick = (e) => { cal.show(evt); e.stopPropagation(); };
        }
      });
    },
  
    //SHOW EVENT FORM
    show : (cell) => {
      let eid = cell.getAttribute("data-eid");
  
      //ADD NEW EVENT
      if (eid === null) {
        let y = cal.hYr.value, m = cal.hMth.value, d = cell.dataset.day;
        if (m.length==1) { m = "0" + m; }
        if (d.length==1) { d = "0" + d; }
        let ymd = `${y}-${m}-${d}T00:00:00`; // RFC 3339
        cal.hForm.reset();
        cal.hID.value = "";
        cal.hStart.value = ymd;
        cal.hEnd.value = ymd;
        cal.hFormDel.style.display = "none";
      }
  
      //EDIT EVENT
      else {
        let edata = JSON.parse(document.getElementById("evt"+eid).innerHTML);
        cal.hID.value = eid;
        cal.hStart.value = edata["evt_start"].replaceAll(" ", "T");
        cal.hEnd.value = edata["evt_end"].replaceAll(" ", "T");
        cal.hTxt.value = edata["evt_text"];
        cal.hColor.value = edata["evt_color"];
        cal.hFormDel.style.display = "block";
      }
  
      //SHOW EVENT FORM
      cal.hBlock.classList.add("show");
    },
  
    //HIDE EVENT FORM
    hide : () => { cal.hBlock.classList.remove("show"); },
  
    //SAVE EVENT
    save : () => {
      cal.ajax(new FormData(cal.hForm), (res) => {
        if (res=="OK") { cal.hide(); cal.draw(); }
        else { alert(res); }
      });
      return false;
    },
  
    //DELETE EVENT
    del : () => { if (confirm("Delete Event?")) {
      // (G1) FORM DATA
      let data = new FormData();
      data.append("req", "del");
      data.append("eid", cal.hID.value);
  
      //AJAX DELETE
      cal.ajax(data, (res) => {
        if (res=="OK") { cal.hide(); cal.draw(); }
        else { alert(res); }
      });
    }}
  };
  window.addEventListener("DOMContentLoaded", cal.init);
  