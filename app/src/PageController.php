<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\Security\Member;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }

        public function index(\SilverStripe\Control\HTTPRequest $request)
        {
            if ($request->getVar('seed')) {
                $page1 = ProductPage::create(['Title' => 'Product page 1']);
                $page1->write();
                $page1->publishRecursive();

                $page2 = ProductPage::create(['Title' => 'Product page 2']);
                $page2->write();
                $page2->publishRecursive();

                foreach (range(1,7) as $num) {
                    $product = Product::create([
                        'Title' => "Product $num for page 1",
                        'ParentID' => $page1->ID,
                        'Price' => rand(5,300)
                    ]);
                    $product->write();
                    $product->publishRecursive();
                }
                foreach (range(1,12) as $num) {
                    $product = Product::create([
                        'Title' => "Product $num for page 1",
                        'ParentID' => $page1->ID,
                        'Price' => rand(5,300)
                    ]);
                    $product->write();
                    $product->publishRecursive();
                }

                foreach (Product::get() as $product) {
                    foreach (range(1, rand(5,10)) as $num) {
                        $review = Review::create([
                            'Content' => 'Review ' . $num . ' for product ' . $product->ID,
                            'Rating' => rand(0, 10),
                            'ProductID' => $product->ID,
                        ]);
                        $review->write();
                    }
                }

                foreach (Review::get() as $review) {
                    $member = Member::get()->sort('RAND()')->first();
                    $review->AuthorID = $member->ID;
                    $review->write();
                }

                die('done');
            }

        }
    }
}
