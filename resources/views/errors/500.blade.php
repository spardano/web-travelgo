
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
         svg{ 
            max-width: 100%;
            max-height: 65vh;
            min-height: 200px;
            margin: 0px auto;
            align-self: center;
        }

        body{
            background: #95b3bb;
            font-family: 'Exo 2', sans-serif;
            text-align: center;
            display:flex;
            height: 100%;
            margin: 0px;
            padding: 0px;
            position: relative;
            min-height: 100vh;
            background-color: #171c24;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='264' height='264' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%231c212e' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%232d4b4d'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E");
        }

        #container{
          align-self:center;
            padding: 0px 10px;
            position: relative;
            width: 90%;
            margin: 20px;
            box-sizing: border-box;
/*             border: 2px rgb(83, 133, 145) solid; */
            box-shadow: 0px 5px 15px -6px rgba(0,0,0,0.75);
            border-radius: 20px;
            max-width: 575px;
            margin: 10px auto;
            background: rgba(5, 13, 25, 0.569);
        }

        h1{
            font-weight:900;
            width: 100;
            margin: 10px 0px;
            color: rgb(83, 133, 145);
            letter-spacing: 5px;
            font-size: 75px;
            text-align: center;
            transform: translateY(-35px);
            text-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
            
            
        }

        .toph h1{
            transform: translateY(20px);
            font-size: 25px;
            margin: 10px 25px;
            display: inline-block;
            font-weight:700;
          

        }
        .number{
            color:#CDC5BD;
        }
    </style>
</head>
<body>

    <div id="container">

        <div class="toph"><h1>ERROR </h1><h1 class="number">404</h1></div>
        <svg xmlns="http://www.w3.org/2000/svg" width="3001" height="3000" fill="none" viewBox="0 0 3001 3000" id="payment-error"><path fill="#F1F1F1" fill-rule="evenodd" d="M415.819 1109.99C415.819 1026.35 483.626 958.543 567.27 958.543H1389.43C1473.07 958.543 1540.88 1026.35 1540.88 1109.99V2552.38C1540.88 2636.02 1473.07 2703.83 1389.43 2703.83H567.27C483.626 2703.83 415.819 2636.02 415.819 2552.38V1109.99ZM567.27 972.967C491.592 972.967 430.243 1034.32 430.243 1109.99V2552.38C430.243 2628.06 491.592 2689.4 567.27 2689.4H1389.43C1465.11 2689.4 1526.46 2628.06 1526.46 2552.38V1109.99C1526.46 1034.32 1465.11 972.967 1389.43 972.967H567.27Z" clip-rule="evenodd"></path><path fill="#F1F1F1" fill-rule="evenodd" d="M1930.32 1925.46L1832.56 1850.04C1826.16 1845.1 1817.54 1844.15 1810.22 1847.56L1624.4 1934.06C1617.35 1937.34 1609.08 1936.59 1602.75 1932.09L1512.29 1867.89C1505.52 1863.09 1496.59 1862.58 1489.32 1866.59L1340.07 1948.82C1331.03 1953.81 1319.73 1951.71 1313.08 1943.81L1221.23 1834.73C1214.29 1826.49 1202.34 1824.61 1193.21 1830.32L1101.96 1887.35C1096.73 1890.62 1090.36 1891.5 1084.44 1889.77L949.502 1850.42V2617.29C949.502 2637.2 965.646 2653.34 985.562 2653.34H1894.26C1914.18 2653.34 1930.32 2637.2 1930.32 2617.29V1925.46Z" clip-rule="evenodd"></path><path fill="#F1F1F1" d="M1144.22 504.191H1252.4V576.311H1144.22V504.191Z"></path><path fill="#F15846" d="M661.025 93.1118H1288.46V540.251H661.025V93.1118Z"></path><path fill="#F1F1F1" d="M235.521 922.483C235.521 842.822 300.099 778.244 379.759 778.244H1201.92C1281.58 778.244 1346.16 842.822 1346.16 922.483V2364.87C1346.16 2444.53 1281.58 2509.11 1201.92 2509.11H379.759C300.099 2509.11 235.521 2444.53 235.521 2364.87V922.483Z"></path><path fill="#3E3D3D" fill-rule="evenodd" d="M228.309 922.484C228.309 838.84 296.116 771.033 379.76 771.033H1201.92C1285.56 771.033 1353.37 838.84 1353.37 922.484V2364.87C1353.37 2448.51 1285.56 2516.32 1201.92 2516.32H379.76C296.116 2516.32 228.309 2448.51 228.309 2364.87V922.484ZM379.76 785.457C304.082 785.457 242.733 846.806 242.733 922.484V2364.87C242.733 2440.55 304.082 2501.89 379.76 2501.89H1201.92C1277.6 2501.89 1338.95 2440.55 1338.95 2364.87V922.484C1338.95 846.806 1277.6 785.457 1201.92 785.457H379.76Z" clip-rule="evenodd"></path><path fill="#fff" fill-rule="evenodd" d="M293.216 807.081C317.323 788.974 347.288 778.244 379.759 778.244H1201.92C1234.39 778.244 1264.35 788.974 1288.46 807.081V2480.27C1264.35 2498.38 1234.39 2509.11 1201.92 2509.11H379.759C347.288 2509.11 317.323 2498.38 293.216 2480.27V807.081Z" clip-rule="evenodd"></path><path fill="#F1F1F1" d="M379.759 1124.42C379.759 1104.5 395.904 1088.36 415.819 1088.36H1165.86C1185.77 1088.36 1201.92 1104.5 1201.92 1124.42V1607.62C1201.92 1627.53 1185.77 1643.68 1165.86 1643.68H415.819C395.904 1643.68 379.759 1627.53 379.759 1607.62V1124.42Z" opacity=".5"></path><path fill="#F15846" d="M379.759 1787.91H588.905V1917.73H379.759V1787.91zM675.448 1787.91H884.593V1917.73H675.448V1787.91zM971.137 1787.91H1201.92V1917.73H971.137V1787.91zM379.759 1997.06H588.905V2126.87H379.759V1997.06zM675.447 1997.06H884.593V2126.87H675.447V1997.06zM971.136 1997.06H1201.92V2126.87H971.136V1997.06z"></path><path fill="#F1F1F1" d="M379.759 2213.42H588.905V2343.23H379.759V2213.42Z"></path><path fill="#F15846" d="M675.447 2213.42H884.593V2343.23H675.447V2213.42Z"></path><path fill="#F1F1F1" d="M971.136 2213.42H1201.92V2343.23H971.136V2213.42Z"></path><path fill="#3E3D3D" fill-rule="evenodd" d="M228.309 922.484C228.309 838.84 296.116 771.033 379.76 771.033H1201.92C1285.56 771.033 1353.37 838.84 1353.37 922.484V2364.87C1353.37 2448.51 1285.56 2516.32 1201.92 2516.32H379.76C296.116 2516.32 228.309 2448.51 228.309 2364.87V922.484ZM379.76 785.457C304.082 785.457 242.733 846.806 242.733 922.484V2364.87C242.733 2440.55 304.082 2501.89 379.76 2501.89H1201.92C1277.6 2501.89 1338.95 2440.55 1338.95 2364.87V922.484C1338.95 846.806 1277.6 785.457 1201.92 785.457H379.76Z" clip-rule="evenodd"></path><path fill="#F1F1F1" d="M437.455 460.92H1144.22V958.543H437.455V460.92Z"></path><path fill="#F1F1F1" fill-rule="evenodd" d="M1144.22 460.92H437.455V421.254L437.616 421.077C437.509 419.949 437.455 418.805 437.455 417.648C437.455 397.733 453.599 381.589 473.514 381.589H1180.28L1144.22 421.254V460.92Z" clip-rule="evenodd"></path><path fill="#F15846" d="M1288.46 540.251C1288.46 560.166 1272.32 576.311 1252.4 576.311C1232.49 576.311 1216.34 560.166 1216.34 540.251C1216.34 520.336 1232.49 504.191 1252.4 504.191C1272.32 504.191 1288.46 520.336 1288.46 540.251Z"></path><path fill="#F1F1F1" d="M1216.34 417.648C1216.34 437.564 1200.2 453.708 1180.28 453.708C1160.37 453.708 1144.22 437.564 1144.22 417.648C1144.22 397.733 1160.37 381.589 1180.28 381.589C1200.2 381.589 1216.34 397.733 1216.34 417.648Z"></path><path fill="#F1F1F1" d="M1144.22 417.648H1216.34V576.31H1144.22V417.648zM437.455 908.059H1144.22V958.542H437.455V908.059z"></path><path fill="#fff" fill-rule="evenodd" d="M1504.82 1864.5V2653.35H1728.39V1885.65L1624.4 1934.06C1617.35 1937.34 1609.08 1936.59 1602.74 1932.09L1512.29 1867.89C1509.99 1866.27 1507.46 1865.13 1504.82 1864.5Z" clip-rule="evenodd"></path><path fill="#F1F1F1" fill-rule="evenodd" d="M2676 1537.84C2683.17 1556.42 2673.92 1577.3 2655.33 1584.46L1948.33 1857.14L1983.51 1738.79C1985.82 1731.04 1983.61 1722.66 1977.79 1717.05L1830.22 1574.8C1824.62 1569.41 1822.35 1561.42 1824.26 1553.89L1851.61 1446.39C1853.66 1438.34 1850.92 1429.84 1844.56 1424.5L1714.13 1314.84C1706.23 1308.19 1704.12 1296.9 1709.09 1287.85L1777.81 1162.89C1783 1153.45 1780.46 1141.64 1771.85 1135.17L1685.8 1070.55C1680.87 1066.85 1677.75 1061.22 1677.23 1055.07L1665.4 915.017L2302.39 669.343C2320.97 662.177 2341.85 671.43 2349.01 690.011L2676 1537.84Z" clip-rule="evenodd"></path><path fill="#fff" fill-rule="evenodd" d="M1852.09 1438.21C1852.45 1440.89 1852.31 1443.67 1851.62 1446.39L1824.27 1553.89C1822.35 1561.43 1824.63 1569.41 1830.22 1574.8L1912.81 1654.41L2616.32 1383.08L2535.87 1174.49L1852.09 1438.21Z" clip-rule="evenodd"></path><path fill="#F1F1F1" d="M1887.05 511.404C1887.05 632.886 1788.57 731.367 1667.09 731.367 1545.61 731.367 1447.12 632.886 1447.12 511.404 1447.12 389.921 1545.61 291.44 1667.09 291.44 1788.57 291.44 1887.05 389.921 1887.05 511.404zM2132.26 511.404C2132.26 469.582 2098.35 435.679 2056.53 435.679 2014.71 435.679 1980.81 469.582 1980.81 511.404 1980.81 553.226 2014.71 587.129 2056.53 587.129 2098.35 587.129 2132.26 553.226 2132.26 511.404z"></path><path fill="#F1F1F1" fill-rule="evenodd" d="M1544.67 598.141L1753.83 388.982L1789.52 424.679L1580.36 633.838L1544.67 598.141Z" clip-rule="evenodd"></path><path fill="#F1F1F1" fill-rule="evenodd" d="M1580.36 388.984L1789.52 598.143L1753.83 633.84L1544.67 424.681L1580.36 388.984Z" clip-rule="evenodd"></path><path fill="#F15846" d="M2716.42 2772.34H2060.14V2873.31H2716.42V2772.34Z"></path><path fill="#F1F1F1" d="M2795.75 2678.59H2139.47V2772.34H2795.75V2678.59zM2752.48 2577.62H2096.2V2678.59H2752.48V2577.62z"></path><path fill="#3E3D3D" fill-rule="evenodd" d="M1.13354 2873.31C1.13354 2869.33 4.36243 2866.1 8.34547 2866.1H2875.09C2879.07 2866.1 2882.3 2869.33 2882.3 2873.31C2882.3 2877.29 2879.07 2880.52 2875.09 2880.52H8.34547C4.36243 2880.52 1.13354 2877.29 1.13354 2873.31Z" clip-rule="evenodd"></path><path fill="#F1F1F1" fill-rule="evenodd" d="M2673.15 2061.97H2132.26V2047.54H2673.15V2061.97ZM2673.15 2202.6H2132.26V2188.18H2673.15V2202.6ZM2413.52 2354.05H2132.26V2339.63H2413.52V2354.05Z" clip-rule="evenodd"></path><path fill="#F15846" d="M1025.23 1373.23C1025.23 1508.65 915.445 1618.43 780.021 1618.43C644.598 1618.43 534.816 1508.65 534.816 1373.23C534.816 1237.81 644.598 1128.02 780.021 1128.02C915.445 1128.02 1025.23 1237.81 1025.23 1373.23Z"></path><path fill="#fff" fill-rule="evenodd" d="M626.816 1485.65L892.443 1220.02L933.239 1260.82L667.612 1526.45L626.816 1485.65Z" clip-rule="evenodd"></path><path fill="#fff" fill-rule="evenodd" d="M667.613 1220.02L933.24 1485.65L892.443 1526.45L626.816 1260.82L667.613 1220.02Z" clip-rule="evenodd"></path><path fill="#3E3D3D" fill-rule="evenodd" d="M1039.65 543.856H549.24V529.433H1039.65V543.856ZM1039.65 670.065H549.24V655.641H1039.65V670.065ZM1039.65 785.456H549.24V771.032H1039.65V785.456Z" clip-rule="evenodd"></path></svg>
        <h1>SORRY, SOMETHING WENT WRONG</h1>

    </div>
</body>
</html>