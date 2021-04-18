using System;
using System.Collections.Generic;
using System.Text;

namespace selling_item.ViewModels
{
    public class MainWindowViewModel : ViewModelBase
    {
        // Window constant 
        public string NamaBarang => "Nama Barang : ";
        public string Jumlah => "Jumlah : ";
        public string Harga => "Harga : ";
        public string Diskon => "Diskon (%): ";
        public string Total => "Total : ";
    }
}
