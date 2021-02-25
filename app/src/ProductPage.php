<?php


namespace {


    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Dev\TestOnly;

    class ProductPage extends SiteTree
    {
        private static $db = [
            'BannerContent' => 'Varchar',
        ];

        private static $has_many = [
            'Products' => Product::class,
        ];

        private static $owns = [
            'Products',
        ];
    }
}
