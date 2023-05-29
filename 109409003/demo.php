<!DOCTYPE html>
<html>
  <head>
    <title>Currency Converter</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>

    <h1>Currency Converter</h1>
    <label for="twd">Enter TWD amount:</label>
    <input type="number" id="twd" name="twd" min="0" step="1" />
    <button onclick="convert()">Convert</button>
    <button type="button" onclick="resetCalculator()">重新開始</button>
    <!--(4) 具備重新開始(reset)功能的按鈕，讓使用者可以進行全新一輪的計算 (5%)-->

    <table>
        <tr>
            <th>Currency</th>
            <th>Buying Rate</th>
        </tr>
        <!-- PHP code to read the XML file and display the exchange rates -->
        <?php
            $xml = simplexml_load_file("rate.xml") or die("Error: Cannot create object");
            foreach ($xml->rate as $rate) {
                echo "<tr>";
                echo "<td>" . $rate['currency'] . "</td>";
                echo "<td>" . $rate->buying . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    <br /><br />
    <div id="result"></div>
    <script>
      function checkInput() {
      var twd = document.getElementById("twd").value;
      if (isNaN(twd) || twd == "") {
        alert("Please enter a valid number.");
        resetCalculator();
      } else {
        convert();
        }
      }

      function convert(xml) {
        var twd = document.getElementById("twd").value;

        if (isNaN(twd) || twd.trim() === "") {
          alert("請輸入有效的數值！");
          resetCalculator();
        }
        //(5) 具備輸入檢查功能，若使用者輸入的內容非有效數值，按下執行計算的按鈕後會跳出警告，並觸發重新開始(reset)功能 (5%)
        var usd = (twd / 28.5).toFixed(2);
        var eur = (twd / 33.5).toFixed(2);
        var jpy = (twd / 0.26).toFixed(2);
        var krw = (twd / 0.024).toFixed(2);
        var aud = (twd / 20.5).toFixed(2);
        var result =
          "USD " +
          usd +
          "<br>" +
          "EUR " +
          eur +
          "<br>" +
          "JPY " +
          jpy +
          "<br>" +
          "KRW " +
          krw +
          "<br>" +
          "AUD " +
          aud;
        document.getElementById("result").innerHTML = result;
      }
    </script>
    <!--(1) 使用 JS 設計一個匯率轉換計算機並在網頁中以文字說明運用方式，使用者可以在網頁中輸入台幣金額；按下執行計算的按鈕後，網頁上會顯示轉換成美金、歐元、日圓、韓元、澳幣的金額與幣別單位；計算結果呈現的數值至少要顯示到小數點下第 2 位 (50%)-->

    <script>
      function resetCalculator() {
        document.getElementById("result").innerHTML = "0";
        document.getElementById("twd").value = "";
      }
    </script>

    <div class="firework"></div>
    <div class="firework-effect"></div>
  </body>
</html>
