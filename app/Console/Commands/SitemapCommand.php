<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Categories\Categories;
use App\Models\Products\Product;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     */
        public function handle()
        {
            $categories = Categories::whereStatus(1)->orderBy('name','asc')->get();
            $products = Product::whereStatus(1)->orderBy('id','desc')->get();
            $sitemap =  Sitemap::create()
                ->add(Url::create('/')
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                    ->setPriority(1))
                ->add(Url::create('/about')
                    ->setPriority(0.9))
                ->add(Url::create('/contact')
                    ->setPriority(0.9))
                ->add(Url::create('/login')
                    ->setPriority(0.9))
                ->add(Url::create('/register')
                    ->setPriority(0.9))
                ->add(Url::create('/sitemap')
                    ->setPriority(0.9))
                ->add(Url::create('/forgot-password')
                    ->setPriority(0.9))
                ->add(Url::create('/terms-of-service')
                    ->setPriority(0.9))
                ->add(Url::create('/privacy-policy')
                    ->setPriority(0.9))
                ->add(Url::create('/faq')
                    ->setPriority(0.9))
                ->add(Url::create('/help')
                    ->setPriority(0.9));


                // generate categories sitemap
                foreach ($categories as $category)
                {
                    $sitemap->add(Url::create("/images/{$category->slug}"));

                    // that category's sub categories sitemap
                    if ($category->activatedSubCatsAsc != null && isset($category->activatedSubCatsAsc) && count($category->activatedSubCatsAsc)>0)
                    {
                        foreach ($category->activatedSubCatsAsc as $subCat)
                        {
                            $sitemap->add(Url::create("/images/{$category->slug}/{$subCat->slug}"));
                        }
                    }
                }

                // generate products sitemap
                foreach ($products as $product)
                {
                    $sitemap->add(Url::create("/{$product->slug}"));
                }

                $sitemap->writeToFile(public_path('sitemap.xml'));
                echo "Sitemap generated successfully";
        }
}
