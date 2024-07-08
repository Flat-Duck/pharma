<?php

return [
    'common' => [
        'actions' => 'العمليات',
        'create' => 'إنشاء',
        'edit' => 'تعديل',
        'update' => 'حفظ التعديلات',
        'new' => 'جديد',
        'cancel' => 'إلغاء',
        'attach' => 'أضافة',
        'detach' => 'إزالة',
        'save' => 'حفظ',
        'delete' => 'حذف',
        'delete_selected' => 'حذف المحدد',
        'search' => 'بحث',
        'back' => 'رجوع إلى القائمة',
        'are_you_sure' => 'هل انت متأكد؟',
        'no_items_found' => 'لاتوجد عناصر',
        'created' => 'تم الانشاء بنجاح',
        'saved' => 'تم الحفظ بنجاح',
        'removed' => 'تم الحذف بنجاح',
    ],
    'suppliers' => [
        'name' => 'الموردين',
        'index_title' => ' قائمة الموردين',
        'new_title' => 'مورد جديد ',
        'create_title' => 'إنشاء مورد  ',
        'edit_title' => 'تعديل',
        'show_title' => 'عرض مورد',
        'inputs' => [
            'name' => 'الاسم',
            'phone' => 'رقم الهاتف',
            'address' => 'العنوان',
        ],
    ],

    'brands' => [
        'name' => 'العلامات التجارية',
        'index_title' => 'قائمة العلامات التجارية',
        'new_title' => 'علامة تجارية جديدة',
        'create_title' => 'إنشاء علامة تجارية',
        'edit_title' => 'تعديل علامة تجارية',
        'show_title' => 'عرض علامة تجارية',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

    'carts' => [
        'name' => 'السلات',
        'index_title' => 'قائمة السلات',
        'new_title' => 'سلة جديدة',
        'create_title' => 'إنشاء سلة',
        'edit_title' => 'تعديل سلة',
        'show_title' => 'عرض سلة',
        'inputs' => [
            'user_id' => 'الزبون',
        ],
    ],

    'categories' => [
        'name' => 'التصنيفات',
        'index_title' => 'قائمة التصنيفات',
        'new_title' => 'تصنيف جديد',
        'create_title' => 'إنشاء تصنيف',
        'edit_title' => 'تعديل تصنيف',
        'show_title' => 'عرض تصنيف',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

    'ads' => [
        'name' => 'الإعلانات',
        'index_title' => 'قائمة الإعلانات',
        'new_title' => 'إعلان جديد',
        'create_title' => 'إنشاء إعلان',
        'edit_title' => 'تعديل إعلان',
        'show_title' => 'عرض إعلان',
        'inputs' => [
            'title' => 'عنوان الاعلان',
            'body' => 'نص الاعلان',
            'image' => 'صورة الاعلان',
            'offer' => 'قيمة العرض',
            'product_id' => 'منتج المعلن',
        ],
    ],

    'orders' => [
        'name' => 'الطلبيات',
        'index_title' => 'الطلبيات قائمة',
        'new_title' => 'جديد طلبية',
        'create_title' => 'إنشاء طلبية',
        'edit_title' => 'تعديل طلبية',
        'show_title' => 'عرض طلبية',
        'inputs' => [
            'number' => 'رقم الطلبية',
            'total' => 'المجموع',
            'status' => 'حالة الطلبية',
            'is_delivered' => 'تم التوصيل',
            'user_id' => 'الزبون',
        ],
    ],

    'products' => [
        'name' => 'المنتجات',
        'index_title' => 'المنتجات قائمة',
        'new_title' => 'جديد منتج',
        'create_title' => 'إنشاء منتج',
        'edit_title' => 'تعديل منتج',
        'show_title' => 'عرض منتج',
        'inputs' => [
            'name' => 'الإسم',
            'description' => 'الوصف',
            'quantity' => 'الكمية',
            'price' => 'السعر',
            'image' => 'صورة المنتج',
            'brand_id' => 'العلامة التجارة',
            'category_id' => 'التصنيف',
        ],
    ],

    'users' => [
        'name' => 'المستخدمين',
        'index_title' => 'قائمة المستخدمين',
        'new_title' => 'مستخدم جديد',
        'create_title' => 'انشاء مستخدم',
        'edit_title' => 'تعديل مستخدم',
        'show_title' => 'عرض مستخدم',
        'inputs' => [
            'name' => 'الإسم',
            'email' => 'البريد الالكتروني',
            'password' => 'كلمة المرور',
        ],
    ],

    'roles' => [
        'name' => 'الادوار',
        'index_title' => 'قائمة الادوار',
        'create_title' => 'انشاء دور',
        'edit_title' => 'تعديل دور',
        'show_title' => 'عرض دور',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

    'permissions' => [
        'name' => 'الصلاحيات',
        'index_title' => 'قائمة الصلاحيات ',
        'create_title' => 'انشاء صلاحية',
        'edit_title' => 'تعديل صلاحية',
        'show_title' => 'عرض صلاحية',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],
];
