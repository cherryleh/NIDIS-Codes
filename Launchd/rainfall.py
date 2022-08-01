#!/Users/cherryleheu/opt/anaconda3/bin/python3
# coding: utf-8

# In[1]:
import requests
from datetime import datetime
from dateutil.relativedelta import relativedelta
import rasterio
import geopandas as gpd
from rasterio.plot import show
import matplotlib.pyplot as plt
import numpy as np
import pandas as pd
from rasterstats import zonal_stats
from standard_precip import spi

lastMonth = (datetime.today() + relativedelta(months=-1)).strftime("%m")
lastMonthYr = (datetime.today() + relativedelta(months=-1)).strftime("%Y")
import os
os.chdir('/Users/cherryleheu/Codes/NIDIS-Codes/Launchd')
path = os.getcwd()


text_file = open("/Users/cherryleheu/Codes/NIDIS-Codes/Launchd/sample.txt", "w")
n = text_file.write(path)
text_file.close()

url = 'https://ikeauth.its.hawaii.edu/files/v2/download/public/system/ikewai-annotated-data/HCDP/production/rainfall/new/month/statewide/data_map/'+lastMonthYr+'/rainfall_new_month_statewide_data_map_'+lastMonthYr+'_'+lastMonth+'.tif'
#https:/ikeauth.its.hawaii.edu/files/v2/download/public/system/ikewai-annotated-data/HCDP/production/rainfall/new/month/statewide/data_map/2022/rainfall_new_month_statewide_data_map_2022_03.tif --output-file rf-wget.tif

r = requests.get(url)
file=f"./rainmaps/2020-/rainfall_{lastMonthYr}_{lastMonth}.tif"
open(file, 'wb').write(r.content)


# In[7]:


ranches = np.arange(1,63)


# In[23]:


for h in ranches:
    ranchshp = gpd.read_file('./ranches.shp',rows=slice(h-1, h))
    ranch = ranchshp['Polygon'].iloc[0]
    csv = pd.read_csv('../ranches/'+ranch+'/'+ranch+'_rf.csv',index_col=[0])
    with rasterio.open(file) as src:
        affine = src.transform
        array = src.read(1)
        df_zonal_stats = pd.DataFrame(zonal_stats(ranchshp, array, affine=affine,nodata=-3.3999999521443642e+38,stats = ['mean']))
    RF= df_zonal_stats['mean'].iloc[0]
    csv=csv.append({'Year':int(lastMonthYr),'Month':lastMonth,'RF_mm':RF,'RF_in':RF/25.4},ignore_index=True)
    #rf[h]=rf[h].append({'Year':i,'Month':j,'RF_mm':RF},ignore_index=True)
    #rf[h]['RF_in']=rf[h]['RF_mm']/25.4
    csv.to_csv('../ranches/'+ranch+'/'+ranch+'_rf.csv')
    csv['date']=pd.date_range('1/1/1920','6/1/2022',freq='MS')
    spi_rain = spi.SPI()
    spi_3=[]
    spi_3 = spi_rain.calculate(csv, 'date', 'RF_in', freq="M", scale=3, 
                          fit_type="lmom", dist_type="gam")
    spi_3=spi_3.rename(columns={"RF_in_scale_3_calculated_index": "SPI-3"})
    spi_3.to_csv(f'../ranches/'+ranch+'/'+ranch+'_spi.csv')


# In[ ]:



# In[ ]:





