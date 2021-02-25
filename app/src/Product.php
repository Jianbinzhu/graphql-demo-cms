<?php


namespace {


    use SilverStripe\Dev\TestOnly;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\Versioned\Versioned;

    class Product extends DataObject
    {
        private static $db = [
            'Title' => 'Varchar',
            'Price' => 'Int',
            'IsFavourite' => 'Boolean',
        ];

        private static $has_one = [
            'Parent' => ProductPage::class,
        ];

        private static $has_many = [
            'Reviews' => Review::class,
        ];

        private static $many_many = [
            'RelatedProducts' => Product::class,
        ];

        private static $extensions = [
            Versioned::class,
        ];

        private static $owns = [
            'Reviews',
        ];

        public function canView($member = null)
        {
            return true;
        }

        public function canEdit($member = null)
        {
            return true;
        }

        public function canDelete($member = null)
        {
            return true;
        }

        public function canCreate($member = null, $context = [])
        {
            return true;
        }
    }
}
