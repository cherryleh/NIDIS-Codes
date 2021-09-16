#!/opt/homebrew/bin/python3
import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
import sys
from datetime import datetime
from dateutil.relativedelta import relativedelta
from calendar import monthrange 

print(sys.argv[:])

grass=sys.argv[1]

rf_df=pd.read_csv("./RS01_BI/RS01_BI_RF_Query_Table.csv")

ONI=pd.read_csv("https://origin.cpc.ncep.noaa.gov/products/analysis_monitoring/ensostuff/detrend.nino34.ascii.txt",delim_whitespace=True)
ANOM = ONI.iloc[-1]['ANOM']

now = datetime.now()
month = now.strftime("%b")
monthname = now.strftime("%B")
monthnum = datetime.today().month
year = datetime.today().year

thismonth =(now+relativedelta(months=+0)).strftime("%b").upper()


twomonths =(now+relativedelta(months=+2)).strftime("%b").upper()

num_days = monthrange(year, monthnum)[1] 

from datetime import date
  
# creating the date object of today's date
todays_date = date.today()

ENSO = []
if ANOM > 1.1: 
    ENSO = rf_df.loc[rf_df['Phase'] == 'SEL'].set_index('Month').loc[thismonth:twomonths]
elif 1.1 >= ANOM >0.5:
    ENSO= rf_df.loc[rf_df['Phase'] == 'WEL'].set_index('Month').loc[thismonth:twomonths]
elif 0.5>=ANOM>=-0.5:
    ENSO= rf_df.loc[rf_df['Phase'] == 'NUT'].set_index('Month').loc[thismonth:twomonths]
elif -0.5> ANOM >= -1.1:
    ENSO= rf_df.loc[rf_df['Phase'] == 'WLA'].set_index('Month').loc[thismonth:twomonths]
elif ANOM < -1.1:
    ENSO= rf_df.loc[rf_df['Phase'] == 'SLA'].set_index('Month').loc[thismonth:twomonths]
else:
    print("Error")


m_rf=ENSO['MRF'][0]
me_rf=ENSO['MeRF'][0]
mn_rf=ENSO['MnRF'][0]


if ANOM > 1.1: 
    phase="a Strong El Nino"
elif 1.1 > ANOM >0.5:
    phase="a Weak El Nino"
elif 0.5>ANOM>-0.5:
    phase="Neutral Conditions"
elif -0.5> ANOM > -1.1:
    phase="a Weak La Nina"
elif ANOM < -1.1:
    phase="a Strong La Nina"
else:
    print("Error")

#Input grass coefficients
#sys.argv[1]='Kikuyugrass'
if sys.argv[1]=='Kikuyu':
    dfpq=4.34
elif sys.argv[1]=='Pangola':
    dfpq=7.6
elif sys.argv[1]=='Buffel':
    dfpq=2.6
elif sys.argv[1]=='MixKikuyu':
    dfpq=8.3
elif sys.argv[1]=='Guinea':
    dfpq=4.8
else:
    print("Error")


dmau=int(sys.argv[2])
au = int(sys.argv[3])
acres=int(sys.argv[4])

#Quarterly Forage Production
me_qfp = ENSO['QFP_Me'][0]
mn_qfp = ENSO['QFP_Mn'][0]



#Site production
m_sp = dfpq*m_rf*acres*num_days
me_sp = dfpq*me_rf*acres*num_days
mn_sp = dfpq*mn_rf*acres*num_days

#Production Ratio
me_pr = round(me_sp / m_sp,2)
mn_pr = round(mn_sp / m_sp,2)

#Grazing days
m_gd = int((m_sp*0.5)/(au*dmau))
me_gd = int((me_sp*0.5)/(au*dmau))
mn_gd = int((mn_sp*0.5)/(au*dmau))

heading = """<html>
<body>
    <div id="output">
    <table id=“multiLevelTable”>
        <tr id="month">
            <th  colspan="3">  {monthname} Historical characteristics for {phase}</td>
        </tr>
        <tr>
            """


new_heading = heading.format(monthname=monthname,
 phase=phase,)


qfp = """<td id="datatitle" colspan="3"> Change in Forage Production</td>
</tr>
<tr>
    <td class="left"> Historical Average </td>
    <td id="num"> {me_qfp} <span>&#8595;</span> </td>
    <td class="right" style="color:{me_qfp_fnt}"> <span style="color:black">&#10230;</span> {me_qfp_res}</td>

</tr>
<tr>
    <td class="left"> Historical Low </td>
    <td id="num"> {mn_qfp} <span>&#8595;</span> </td>
    <td class="right" style="color:{mn_qfp_fnt}"> <span style="color:black">&#10230;</span> {mn_qfp_res} </td>
</tr>
<tr>"""
            
if me_qfp>50:
    me_qfp_res = 'Funding request not likely'
    me_qfp_fnt = 'black'
else:
    me_qfp_res = 'Potential to request funding'
    me_qfp_fnt = 'red'

if mn_qfp>50:
    mn_qfp_res = 'Funding request not likely'
    mn_qfp_fnt = 'black'
else:
    mn_qfp_res = 'Potential to request funding'
    mn_qfp_fnt = 'red'

new_qfp = qfp.format(me_qfp=me_qfp, 
 me_qfp_fnt=me_qfp_fnt, 
 me_qfp_res=me_qfp_res,
 mn_qfp=mn_qfp,
 mn_qfp_fnt=mn_qfp_fnt,
 mn_qfp_res=mn_qfp_res)

pr = """
<td id="datatitle" colspan="3"> Production Ratio</td>
        </tr>
        <tr>
            <td class="left"> Historical Average </td>
            <td id="num"> {me_pr} </td>
            <td class="right" style="color:{me_pr_fnt}"><span style="color:black">&#10230;</span> {me_pr_res}</td>

        </tr>
        <tr>
            <td class="left"> Historical Low </td>
            <td id="num"> {mn_pr} </td>
            <td class="right" style="color:{mn_pr_fnt}"><span style="color:black">&#10230;</span> {mn_pr_res} </td>
        </tr>
        <tr>"""

if me_pr>0.5:
    me_pr_res = 'Site is stable'
    me_pr_fnt = 'black'
else:
    me_pr_res = 'Site is unstable'
    me_pr_fnt = 'red'

if mn_pr>50:
    mn_pr_res = 'Site is stable'
    mn_pr_fnt = 'black'
else:
    mn_pr_res = 'Site is unstable'
    mn_pr_fnt = 'red'

new_pr = pr.format(me_pr=me_pr, 
 me_pr_fnt=me_pr_fnt, 
 me_pr_res=me_pr_res,
 mn_pr=mn_pr,
 mn_pr_fnt=mn_pr_fnt,
 mn_pr_res=mn_pr_res)

gd = """<td id="datatitle" colspan="3"> Grazing Days</td>
        </tr>
        <tr>
            <td class="left"> Historical Average </td>
            <td id="num"> {me_gd} </td>
            <td class="right" style="color:{me_gd_fnt}"><span style="color:black">&#10230;</span> {me_gd_res}</td>

        </tr>
        <tr>
            <td class="left"> Historical Low </td>
            <td id="num"> {mn_gd} </td>
            <td class="right" style="color:{mn_gd_fnt}"><span style="color:black">&#10230;</span> {mn_gd_res} </td>
        </tr>
    </table>
    </div>
</body>
</html>"""

if me_gd>num_days:
    me_gd_res = 'Stock or do nothing'
    me_gd_fnt = 'black'
else:
    me_gd_res = 'De-stock or supplement feeding'
    me_gd_fnt = 'red'

if mn_gd>50:
    mn_gd_res = 'Stock or do nothing'
    mn_gd_fnt = 'black'
else:
    mn_gd_res = 'De-stock or supplement feeding'
    mn_gd_fnt = 'red'

new_gd = gd.format(me_gd=me_gd, 
   me_gd_fnt=me_gd_fnt, 
   me_gd_res=me_gd_res, 
   mn_gd=mn_gd,
   mn_gd_fnt=mn_gd_fnt, 
   mn_gd_res=mn_gd_res)

file = open("../../Codes/testing/python.html","w")
file.write(new_heading)
file.write(new_qfp)
file.write(new_pr)
file.write(new_gd)
file.close()

print(me_gd)