<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['sign_in'] = [
    [
        'field'  => 'username',
        'label'  => 'Username',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'password',
        'label'  => 'Password',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ]
];

$config['register'] = [
    [
        'field'  => 'userName',
        'label'  => 'Nama Depan',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userLastName',
        'label'  => 'Nama Belakang',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userNisn',
        'label'  => 'NISN',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userBP',
        'label'  => 'Tempat Lahir',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userDateB',
        'label'  => 'Tanggal Lahir',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userUsername',
        'label'  => 'Username',
        'rules'  => 'trim|required|is_unique[user.userUsername]',
        'errors' => [
            'required'  => '* %s tidak boleh kosong',
            'is_unique' => '* %s sudah digunakan.',
        ]
    ],
    [
        'field'  => 'email',
        'label'  => 'Email',
        'rules'  => 'trim|required|valid_email|is_unique[user.userEmail]',
        'errors' => [
            'required'    => '* %s tidak boleh kosong',
            'valid_email' => '* %s tidak valid.',
            'is_unique'   => '* %s sudah digunakan.',
        ]
    ],
    [
        'field'  => 'userGender',
        'label'  => 'Jenis Kelamin',
        'rules'  => 'trim|required',
        'errors' => [
            'required'  => '* Harap Pilih %s',
            // 'is_unique' => '* %s sudah digunakan.',
        ]
    ],
    [
        'field'  => 'userAlamat',
        'label'  => 'Alamat',
        'rules'  => 'trim|required',
        'errors' => [
            'required'    => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userPhone',
        'label'  => 'No.HP',
        'rules'  => 'trim|required',
        'errors' => [
            'required'    => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'password',
        'label'  => 'Password',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'repeatPassword',
        'label'  => 'Konfirmasi Password',
        'rules'  => 'trim|required|matches[password]',
        'errors' => [
            'required' => '* %s tidak boleh kosong',
            'matches'  => '* %s tidak sama.'
        ]
    ]
];

$config['update_profile'] = [
    [
        'field'  => 'userName',
        'label'  => 'Nama',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userUsername',
        'label'  => 'Username',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'userEmail',
        'label'  => 'Email',
        'rules'  => 'trim|required|valid_email',
        'errors' => [
            'required'    => '* %s tidak boleh kosong',
            'valid_email' => '* %s tidak valid.'
        ]
    ],
    [
        'field'  => 'userAddress',
        'label'  => 'Alamat',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ]
];

$config['reset_password'] = [
    [
        'field'  => 'userPassword',
        'label'  => 'Password',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'confirmPassword',
        'label'  => 'Konfirmasi password',
        'rules'  => 'trim|required|matches[userPassword]',
        'errors' => [
            'required' => '* %s tidak boleh kosong',
            'matches'  => '* %s tidak sama.'
        ]
    ]
];

$config['create_category'] = [
    [
        'field'  => 'categoriesName',
        'label'  => 'Nama kategori',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ]
];

$config['create_product'] = [
    [
        'field'  => 'productName',
        'label'  => 'Nama produk',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'productPrice',
        'label'  => 'Harga produk',
        'rules'  => 'trim|required|numeric',
        'errors' => [
            'required' => '* %s tidak boleh kosong',
            'numeric'  => '* %s hanya boleh diisi angka',
        ]
    ],
    [
        'field'  => 'categoriesId',
        'label'  => 'Kategori produk',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'productDescription',
        'label'  => 'Deskripsi produk',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ]
];

$config['create_slider'] = [
    [
        'field'  => 'sliderName',
        'label'  => 'Nama slider',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'sliderNumber',
        'label'  => 'No urut slider',
        'rules'  => 'trim|required|numeric|max_length[1]',
        'errors' => [
            'required'   => '* %s tidak boleh kosong',
            'numeric'    => '* %s harus diisi angka.',
            'max_length' => '* %s hanya boleh diisi 1 - 3'
        ]
    ]
];

$config['update_about'] = [
    [
        'field'  => 'aboutName',
        'label'  => 'Nama Toko',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'aboutPhone',
        'label'  => 'Nomor Telepon',
        'rules'  => 'trim|required|numeric|max_length[50]',
        'errors' => [
            'required'   => '* %s tidak boleh kosong',
            'numeric'    => '* %s harus diisi angka.',
            'max_length' => '* %s hanya boleh diisi 50'
        ]
    ],
    [
        'field'  => 'aboutEmail',
        'label'  => 'Email Toko',
        'rules'  => 'trim|required|valid_email',
        'errors' => [
            'required' => '* %s tidak boleh kosong',
            'valid_email' => '* %s email tidak valid'
        ]
    ],
    [
        'field'  => 'aboutAddress',
        'label'  => 'Alamat Toko',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'aboutDescription',
        'label'  => 'Deskripsi Toko',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
];

$config['contact_us'] = [
    [
        'field'  => 'name',
        'label'  => 'Nama',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'subject',
        'label'  => 'Subject',
        'rules'  => 'trim|required',
        'errors' => [
            'required'   => '* %s tidak boleh kosong'
        ]
    ],
    [
        'field'  => 'email',
        'label'  => 'Email',
        'rules'  => 'trim|required|valid_email',
        'errors' => [
            'required'    => '* %s tidak boleh kosong',
            'valid_email' => '* %s email tidak valid'
        ]
    ],
    [
        'field'  => 'phone_number',
        'label'  => 'Nomor Telepon',
        'rules'  => 'trim|required|numeric|max_length[50]',
        'errors' => [
            'required'   => '* %s tidak boleh kosong',
            'numeric'    => '* %s harus diisi angka.',
            'max_length' => '* %s hanya boleh diisi 50'
        ]
    ],
    [
        'field'  => 'message',
        'label'  => 'Pesan',
        'rules'  => 'trim|required',
        'errors' => [
            'required' => '* %s tidak boleh kosong'
        ]
    ]
];