<?php


namespace {


    use SilverStripe\Dev\TestOnly;
    use SilverStripe\ORM\DataObject;
    use SilverStripe\Security\Member;
    use SilverStripe\Versioned\Versioned;

    class Review extends DataObject
    {
        private static $db = [
            'Content' => 'Varchar',
            'Rating' => 'Int',
        ];

        private static $has_one = [
            'Author' => Member::class,
            'Product' => Product::class,
        ];

        private static $extensions = [
            Versioned::class,
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
