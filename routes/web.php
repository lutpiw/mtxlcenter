<?php

use App\Livewire\Donation\Campaign;
use App\Livewire\Donation\CampaignDetail;
use App\Livewire\Donation\CampaignOrder;
use App\Livewire\Donation\CampaignOrderFinish;
use App\Livewire\Donation\Index;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;


Route::get('/', HomePage::class);
Route::get('/donasi', Index::class)->name('donasi');
Route::get('/donasi/campaign', Campaign::class)->name('donasi.campaign');
Route::get('/donasi/campaign/program/{ziswafProgramSlug}', Campaign::class)->name('donasi.campaign_program');
Route::get('/donasi/campaign/category/{ziswafCategorySlug}', Campaign::class)->name('donasi.campaign_category');
Route::get('/donasi/campaign/{ziswafCampaign:slug}', CampaignDetail::class)->name('donasi.campaign_detail');
Route::get('/donasi/campaign/order/{ziswafCampaign:slug}', CampaignOrder::class)->name('donasi.campaign_order');
Route::get('/donasi/campaign/order-finish/{ziswafTransaction:transaction_id}', CampaignOrderFinish::class)->name('donasi.campaign_order_finish');
