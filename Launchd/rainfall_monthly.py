#!/Users/cherryleheu/opt/anaconda3/bin/python3

#Processing monthly averages of rainfall

#import packages
import pandas as pd
pd.options.mode.chained_assignment = None
import matplotlib.pyplot as plt
import numpy as np
from scipy import optimize
from datetime import datetime
from dateutil.relativedelta import *
import calendar



#get today's date
now = datetime.now()

today = now.strftime("%Y-%m-%d") 

thisMonth = now.strftime("%Y-%m")

ranches = np.arange(1,63)


#ago12m = datetime.today() + relativedelta(months=-12)
    
last12m = datetime.today() + relativedelta(months=-11)


datem = datetime.today().strftime("%m")

monthInd = -int(datem)+1

thisMonthN = int(now.strftime("%m"))

thisMonthL = now.strftime("%B")

ago13m = datetime.today() + relativedelta(months=-12)
last13m = ago13m.strftime("%Y-%m")

ago1m = datetime.today() + relativedelta(months=-1)
lastM = ago1m.strftime("%m/1/%Y")

#average monthly
def rf_avg(arr):
    rfdf = arr.groupby(['Month'],as_index=False).mean()
    rfdf['Month'] = rfdf['Month'].astype(np.uint8).apply(lambda x: calendar.month_name[x])
    rfdf['rolledMonth'] = np.roll(rfdf.Month, monthInd)
    rfdf['RF'] = np.roll(rfdf.RF_in, monthInd)
    return rfdf

#last 12 months
def rf_12m(arr):
    rf12m = arr
    rf12m['Month'] = rf12m['Month'].astype(np.uint8).apply(lambda x: calendar.month_name[x])
    rf12m = rf12m.tail(12)
    rf12m['RF'] = rf12m['RF_in'] 
    return rf12m

for i in ranches:
    rf = pd.read_csv(f"/Users/cherryleheu/Codes/NIDIS-Codes/ranches/RS{i:02d}/RS{i:02d}_rf.csv")
    rfdf=rf_avg(rf)
    rfdf=rfdf.drop(['Unnamed: 0','Year','RF_mm'],axis=1)
    rf12m=rf_12m(rf)
    rf['datetime']=pd.date_range('1/1/1920',lastM,freq='MS')
    rfdf.to_csv(f'../ranches/RS{i:02d}/RS{i:02d}_rf_month.csv') 
    rf12m.to_csv(f'../ranches/RS{i:02d}/RS{i:02d}_rf_12m.csv')
    rf.to_csv(f'../ranches/RS{i:02d}/RS{i:02d}_rf_hist.csv')     
        