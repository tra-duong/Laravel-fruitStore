function updateCustomerName() {
    var customerName = document.getElementById("customer_name").value;
    document.getElementById("preview-customer-name").innerText = customerName;
}
function printAndSave() {
    var table = document.getElementById("invoice-preview");
    var currentDate = new Date();
    var formattedDate = currentDate.toLocaleDateString();
    var css = `
        body {
            font-family: Arial, sans-serif;
            padding-top: 3em;
        }
        table { width: 100%; border-collapse: collapse; border: 1px solid;}
        table, th, td {
            border: 1px solid;
            padding: 5px;
        }
        #preview-customer-name{
            text-align: left;
        }
        .number{
            text-align: right;
        }
        tr{
            line-height: 1.5em;
        }
    `;
    newWin = window.open("");
    newWin.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Print Preview</title>
            <style>${css}</style>
        </head>
        <body>
            Invoice ${formattedDate}
            ${table.outerHTML}
        </body>
        </html>
    `);
    newWin.print();
    newWin.close();
}
