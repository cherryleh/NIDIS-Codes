#!/Users/cherryleheu/opt/anaconda3/bin/python3
# coding: utf-8

import pandas as pd
import numpy as np

ranch = np.arange(1,63)

for i in ranch:
    spi = pd.read_csv(f'/Users/cherryleheu/Codes/NIDIS-Codes/ranches/RS{i:02d}/RS{i:02d}_spi.csv',index_col=[0])
    spi_pos=spi
    spi_pos['RF_in_scale_3_calculated_index'] = spi_pos['RF_in_scale_3_calculated_index'].clip(lower=0)
    spi = pd.read_csv(f'/Users/cherryleheu/Codes/NIDIS-Codes/ranches/RS{i:02d}/RS{i:02d}_spi.csv',index_col=[0])
    spi_neg=spi
    spi_neg['RF_in_scale_3_calculated_index'] = spi_neg['RF_in_scale_3_calculated_index'].clip(upper=0)
    spi_pos.to_csv(f'/Users/cherryleheu/Codes/NIDIS-Codes/ranches/RS{i:02d}/RS{i:02d}_spiPOS.csv')
    spi_neg.to_csv(f'/Users/cherryleheu/Codes/NIDIS-Codes/ranches/RS{i:02d}/RS{i:02d}_spiNEG.csv')    