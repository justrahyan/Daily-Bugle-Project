<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        // Data dummy untuk berita dengan URL gambar dan tanggal
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 1', 'date' => '2024-07-20', 'region' => 'Jakarta'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 2', 'date' => '2024-07-19', 'region' => 'Jawa Timur'],
            ['id' => 3, 'title' => 'kesehatan Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 3', 'date' => '2024-07-18', 'region' => 'Jawa Barat'],
            ['id' => 4, 'title' => 'hiburan Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 4', 'date' => '2024-07-17', 'region' => 'Jawa Tengah'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 5', 'date' => '2024-07-16', 'region' => 'Jakarta'],
            ['id' => 6, 'title' => 'kesehatan Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 6', 'date' => '2024-07-15', 'region' => 'Jawa Timur'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 7', 'date' => '2024-07-14', 'region' => 'Jawa Barat'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 8', 'date' => '2024-07-13', 'region' => 'Jawa Tengah'],
            ['id' => 9, 'title' => 'kesehatan Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 9', 'date' => '2024-07-12', 'region' => 'Jakarta'],
            ['id' => 10, 'title' => 'hiburan Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 10', 'date' => '2024-07-11', 'region' => 'Jawa Timur'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 11', 'date' => '2024-07-10', 'region' => 'Jawa Barat'],
            ['id' => 12, 'title' => 'kesehatan Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 12', 'date' => '2024-07-09', 'region' => 'Jawa Tengah'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 13', 'date' => '2024-07-08', 'region' => 'Jakarta'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 14', 'date' => '2024-07-07', 'region' => 'Jawa Timur'],
            ['id' => 15, 'title' => 'kesehatan Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 15', 'date' => '2024-07-06', 'region' => 'Jawa Barat'],
            ['id' => 16, 'title' => 'hiburan Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 16', 'date' => '2024-07-05', 'region' => 'Jawa Tengah'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 17', 'date' => '2024-07-04', 'region' => 'Jakarta'],
            ['id' => 18, 'title' => 'kesehatan Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 18', 'date' => '2024-07-03', 'region' => 'Jawa Timur'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 19', 'date' => '2024-07-02', 'region' => 'Jawa Barat'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 20', 'date' => '2024-07-01', 'region' => 'Jawa Tengah'],
            ['id' => 21, 'title' => 'kesehatan Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 21', 'date' => '2024-06-30', 'region' => 'Jakarta'],
            ['id' => 22, 'title' => 'hiburan Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 22', 'date' => '2024-06-29', 'region' => 'Jawa Timur'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 23', 'date' => '2024-06-28', 'region' => 'Jawa Barat'],
            ['id' => 24, 'title' => 'kesehatan Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 24', 'date' => '2024-06-27', 'region' => 'Jawa Tengah'],
            ['id' => 25, 'title' => 'kesehatan Alert: Example Title 25', 'body' => 'This is a short description of the news article number 25.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 25', 'date' => '2024-06-28', 'region' => 'Jawa Tengah'],
            ['id' => 26, 'title' => 'kesehatan Alert: Example Title 26', 'body' => 'This is a short description of the news article number 26.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 26', 'date' => '2024-06-29', 'region' => 'Jawa Tengah'],
            ['id' => 27, 'title' => 'kesehatan Alert: Example Title 27', 'body' => 'This is a short description of the news article number 27.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 27', 'date' => '2024-06-30', 'region' => 'Jawa Tengah'],
        ]);        

        // Data dummy untuk kategori editor choice, komunitas, dan opini
        $editorChoiceMain = ['id' => 1, 'title' => 'Feature Main Title', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/800x400', 'date' => '2024-07-20'];
        $editorChoiceNews = collect([
            ['id' => 2, 'title' => 'Feature Title 2', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Feature Title 3', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Feature Title 4', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Feature Title 5', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Feature Title 6', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Feature Title 7', 'category' => 'Feature', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
        ]);

        $komunitasMain = ['id' => 1, 'title' => 'Komunitas Main Title', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/800x400', 'date' => '2024-07-20'];
        $komunitasNews = collect([
            ['id' => 2, 'title' => 'Komunitas Title 2', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Komunitas Title 3', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Komunitas Title 4', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Komunitas Title 5', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Komunitas Title 6', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Komunitas Title 7', 'category' => 'Komunitas', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
        ]);

        $opiniMain = ['id' => 1, 'title' => 'Opini Main Title', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/800x400', 'date' => '2024-07-20'];
        $opiniNews = collect([
            ['id' => 2, 'title' => 'Opini Title 2', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 3, 'title' => 'Opini Title 3', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 4, 'title' => 'Opini Title 4', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 5, 'title' => 'Opini Title 5', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
            ['id' => 6, 'title' => 'Opini Title 6', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-19'],
            ['id' => 7, 'title' => 'Opini Title 7', 'category' => 'Opini', 'image_url' => 'https://via.placeholder.com/70', 'date' => '2024-07-18'],
        ]);

        // Paginate the news collection
        $perPage = 6; // Number of items per page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $news->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $news->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

        $popularNews = [
            ['title' => 'Popular News with title 1', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-18'],
            ['title' => 'Popular News with title 2', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-17'],
            ['title' => 'Popular News with title 3', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-16'],
            ['title' => 'Popular News with title 4', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-15'],
            ['title' => 'Popular News with title 5', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-14'],
        ];

        // Data dummy untuk kategori
        $categories = ['Politik', 'kesehatan', 'Teknologi', 'Hiburan', 'Olahraga'];

        // Data dummy untuk regions
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];

        return view('user.home', compact('news', 'paginatedNews', 'popularNews', 'categories', 'regions', 'editorChoiceMain', 'editorChoiceNews', 'komunitasMain', 'komunitasNews', 'opiniMain', 'opiniNews'));
    }

    public function category($category)
    {
        // Data dummy untuk berita dengan URL gambar dan tanggal
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 1', 'date' => '2024-07-20', 'region' => 'Jakarta'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 2', 'date' => '2024-07-19', 'region' => 'Jawa Timur'],
            ['id' => 3, 'title' => 'kesehatan Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 3', 'date' => '2024-07-18', 'region' => 'Jawa Barat'],
            ['id' => 4, 'title' => 'hiburan Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 4', 'date' => '2024-07-17', 'region' => 'Jawa Tengah'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 5', 'date' => '2024-07-16', 'region' => 'Jakarta'],
            ['id' => 6, 'title' => 'kesehatan Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 6', 'date' => '2024-07-15', 'region' => 'Jawa Timur'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 7', 'date' => '2024-07-14', 'region' => 'Jawa Barat'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 8', 'date' => '2024-07-13', 'region' => 'Jawa Tengah'],
            ['id' => 9, 'title' => 'kesehatan Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 9', 'date' => '2024-07-12', 'region' => 'Jakarta'],
            ['id' => 10, 'title' => 'hiburan Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 10', 'date' => '2024-07-11', 'region' => 'Jawa Timur'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 11', 'date' => '2024-07-10', 'region' => 'Jawa Barat'],
            ['id' => 12, 'title' => 'kesehatan Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 12', 'date' => '2024-07-09', 'region' => 'Jawa Tengah'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 13', 'date' => '2024-07-08', 'region' => 'Jakarta'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 14', 'date' => '2024-07-07', 'region' => 'Jawa Timur'],
            ['id' => 15, 'title' => 'kesehatan Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 15', 'date' => '2024-07-06', 'region' => 'Jawa Barat'],
            ['id' => 16, 'title' => 'hiburan Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 16', 'date' => '2024-07-05', 'region' => 'Jawa Tengah'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 17', 'date' => '2024-07-04', 'region' => 'Jakarta'],
            ['id' => 18, 'title' => 'kesehatan Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 18', 'date' => '2024-07-03', 'region' => 'Jawa Timur'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 19', 'date' => '2024-07-02', 'region' => 'Jawa Barat'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 20', 'date' => '2024-07-01', 'region' => 'Jawa Tengah'],
            ['id' => 21, 'title' => 'kesehatan Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 21', 'date' => '2024-06-30', 'region' => 'Jakarta'],
            ['id' => 22, 'title' => 'hiburan Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 22', 'date' => '2024-06-29', 'region' => 'Jawa Timur'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 23', 'date' => '2024-06-28', 'region' => 'Jawa Barat'],
            ['id' => 24, 'title' => 'kesehatan Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 24', 'date' => '2024-06-27', 'region' => 'Jawa Tengah'],
            ['id' => 25, 'title' => 'kesehatan Alert: Example Title 25', 'body' => 'This is a short description of the news article number 25.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 25', 'date' => '2024-06-28', 'region' => 'Jawa Tengah'],
            ['id' => 26, 'title' => 'kesehatan Alert: Example Title 26', 'body' => 'This is a short description of the news article number 26.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 26', 'date' => '2024-06-29', 'region' => 'Jawa Tengah'],
            ['id' => 27, 'title' => 'kesehatan Alert: Example Title 27', 'body' => 'This is a short description of the news article number 27.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 27', 'date' => '2024-06-30', 'region' => 'Jawa Tengah'],
        ]);        
    
        // Filter berita berdasarkan kategori
        $filteredNews = $news->filter(function ($newsItem) use ($category) {
            return strtolower($newsItem['category']) === strtolower($category);
        });

       // Paginate the filtered news collection
       $perPage = 6; // Number of items per page
       $currentPage = LengthAwarePaginator::resolveCurrentPage();
       $currentItems = $filteredNews->slice(($currentPage - 1) * $perPage, $perPage)->all();
       $paginatedNews = new LengthAwarePaginator($currentItems, $filteredNews->count(), $perPage, $currentPage, [
           'path' => LengthAwarePaginator::resolveCurrentPath()
       ]);
   
       $popularNews = [
            ['title' => 'Popular News with title 1', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-18'],
            ['title' => 'Popular News with title 2', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-17'],
            ['title' => 'Popular News with title 3', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-16'],
            ['title' => 'Popular News with title 4', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-15'],
            ['title' => 'Popular News with title 5', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-14'],
        ];

        // Data dummy untuk kategori
        $categories = ['Politik', 'kesehatan', 'Teknologi', 'Hiburan', 'Olahraga'];

        // Data dummy untuk regions
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];
   
       return view('user.category', compact('category', 'paginatedNews', 'popularNews', 'categories', 'regions'));
   
    }

    public function region($region)
    {
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 1', 'date' => '2024-07-20', 'region' => 'Jakarta'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 2', 'date' => '2024-07-19', 'region' => 'Jawa Timur'],
            ['id' => 3, 'title' => 'kesehatan Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 3', 'date' => '2024-07-18', 'region' => 'Jawa Barat'],
            ['id' => 4, 'title' => 'hiburan Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 4', 'date' => '2024-07-17', 'region' => 'Jawa Tengah'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 5', 'date' => '2024-07-16', 'region' => 'Jakarta'],
            ['id' => 6, 'title' => 'kesehatan Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 6', 'date' => '2024-07-15', 'region' => 'Jawa Timur'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 7', 'date' => '2024-07-14', 'region' => 'Jawa Barat'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 8', 'date' => '2024-07-13', 'region' => 'Jawa Tengah'],
            ['id' => 9, 'title' => 'kesehatan Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 9', 'date' => '2024-07-12', 'region' => 'Jakarta'],
            ['id' => 10, 'title' => 'hiburan Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 10', 'date' => '2024-07-11', 'region' => 'Jawa Timur'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 11', 'date' => '2024-07-10', 'region' => 'Jawa Barat'],
            ['id' => 12, 'title' => 'kesehatan Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 12', 'date' => '2024-07-09', 'region' => 'Jawa Tengah'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 13', 'date' => '2024-07-08', 'region' => 'Jakarta'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 14', 'date' => '2024-07-07', 'region' => 'Jawa Timur'],
            ['id' => 15, 'title' => 'kesehatan Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 15', 'date' => '2024-07-06', 'region' => 'Jawa Barat'],
            ['id' => 16, 'title' => 'hiburan Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 16', 'date' => '2024-07-05', 'region' => 'Jawa Tengah'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 17', 'date' => '2024-07-04', 'region' => 'Jakarta'],
            ['id' => 18, 'title' => 'kesehatan Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 18', 'date' => '2024-07-03', 'region' => 'Jawa Timur'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 19', 'date' => '2024-07-02', 'region' => 'Jawa Barat'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 20', 'date' => '2024-07-01', 'region' => 'Jawa Tengah'],
            ['id' => 21, 'title' => 'kesehatan Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 21', 'date' => '2024-06-30', 'region' => 'Jakarta'],
            ['id' => 22, 'title' => 'hiburan Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 22', 'date' => '2024-06-29', 'region' => 'Jawa Timur'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 23', 'date' => '2024-06-28', 'region' => 'Jawa Barat'],
            ['id' => 24, 'title' => 'kesehatan Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 24', 'date' => '2024-06-27', 'region' => 'Jawa Tengah'],
            ['id' => 25, 'title' => 'kesehatan Alert: Example Title 25', 'body' => 'This is a short description of the news article number 25.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 25', 'date' => '2024-06-28', 'region' => 'Jawa Tengah'],
            ['id' => 26, 'title' => 'kesehatan Alert: Example Title 26', 'body' => 'This is a short description of the news article number 26.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 26', 'date' => '2024-06-29', 'region' => 'Jawa Tengah'],
            ['id' => 27, 'title' => 'kesehatan Alert: Example Title 27', 'body' => 'This is a short description of the news article number 27.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 27', 'date' => '2024-06-30', 'region' => 'Jawa Tengah'],
        ]);
        
    
        // Filter news by region
        $filteredNews = $news->filter(function ($newsItem) use ($region) {
            return strtolower($newsItem['region']) === strtolower($region);
        });

        // Paginate the filtered news collection
        $perPage = 6; // Number of items per page
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $filteredNews->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedNews = new LengthAwarePaginator($currentItems, $filteredNews->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath()
        ]);

       $popularNews = [
            ['title' => 'Popular News with title 1', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-18'],
            ['title' => 'Popular News with title 2', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-17'],
            ['title' => 'Popular News with title 3', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-16'],
            ['title' => 'Popular News with title 4', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-15'],
            ['title' => 'Popular News with title 5', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-14'],
        ];

        // Data dummy untuk kategori dan regions
        $categories = ['Politik', 'kesehatan', 'Teknologi', 'Hiburan', 'Olahraga'];
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];

        return view('user.region', compact('region', 'paginatedNews', 'popularNews', 'categories', 'regions'));
   
    }

    public function detail($id)
    {
        $news = collect([
            ['id' => 1, 'title' => 'Breaking News: Example Title 1', 'body' => 'This is a short description of the news article number 1.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 1', 'date' => '2024-07-20', 'region' => 'Jakarta'],
            ['id' => 2, 'title' => 'Tech Update: Example Title 2', 'body' => 'This is a short description of the news article number 2.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 2', 'date' => '2024-07-19', 'region' => 'Jawa Timur'],
            ['id' => 3, 'title' => 'kesehatan Highlight: Example Title 3', 'body' => 'This is a short description of the news article number 3.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 3', 'date' => '2024-07-18', 'region' => 'Jawa Barat'],
            ['id' => 4, 'title' => 'hiburan Buzz: Example Title 4', 'body' => 'This is a short description of the news article number 4.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 4', 'date' => '2024-07-17', 'region' => 'Jawa Tengah'],
            ['id' => 5, 'title' => 'Political Debate: Example Title 5', 'body' => 'This is a short description of the news article number 5.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 5', 'date' => '2024-07-16', 'region' => 'Jakarta'],
            ['id' => 6, 'title' => 'kesehatan Alert: Example Title 6', 'body' => 'This is a short description of the news article number 6.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 6', 'date' => '2024-07-15', 'region' => 'Jawa Timur'],
            ['id' => 7, 'title' => 'Breaking News: Example Title 7', 'body' => 'This is a short description of the news article number 7.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 7', 'date' => '2024-07-14', 'region' => 'Jawa Barat'],
            ['id' => 8, 'title' => 'Tech Update: Example Title 8', 'body' => 'This is a short description of the news article number 8.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 8', 'date' => '2024-07-13', 'region' => 'Jawa Tengah'],
            ['id' => 9, 'title' => 'kesehatan Highlight: Example Title 9', 'body' => 'This is a short description of the news article number 9.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 9', 'date' => '2024-07-12', 'region' => 'Jakarta'],
            ['id' => 10, 'title' => 'hiburan Buzz: Example Title 10', 'body' => 'This is a short description of the news article number 10.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 10', 'date' => '2024-07-11', 'region' => 'Jawa Timur'],
            ['id' => 11, 'title' => 'Political Debate: Example Title 11', 'body' => 'This is a short description of the news article number 11.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 11', 'date' => '2024-07-10', 'region' => 'Jawa Barat'],
            ['id' => 12, 'title' => 'kesehatan Alert: Example Title 12', 'body' => 'This is a short description of the news article number 12.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 12', 'date' => '2024-07-09', 'region' => 'Jawa Tengah'],
            ['id' => 13, 'title' => 'Breaking News: Example Title 13', 'body' => 'This is a short description of the news article number 13.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 13', 'date' => '2024-07-08', 'region' => 'Jakarta'],
            ['id' => 14, 'title' => 'Tech Update: Example Title 14', 'body' => 'This is a short description of the news article number 14.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 14', 'date' => '2024-07-07', 'region' => 'Jawa Timur'],
            ['id' => 15, 'title' => 'kesehatan Highlight: Example Title 15', 'body' => 'This is a short description of the news article number 15.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 15', 'date' => '2024-07-06', 'region' => 'Jawa Barat'],
            ['id' => 16, 'title' => 'hiburan Buzz: Example Title 16', 'body' => 'This is a short description of the news article number 16.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 16', 'date' => '2024-07-05', 'region' => 'Jawa Tengah'],
            ['id' => 17, 'title' => 'Political Debate: Example Title 17', 'body' => 'This is a short description of the news article number 17.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 17', 'date' => '2024-07-04', 'region' => 'Jakarta'],
            ['id' => 18, 'title' => 'kesehatan Alert: Example Title 18', 'body' => 'This is a short description of the news article number 18.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 18', 'date' => '2024-07-03', 'region' => 'Jawa Timur'],
            ['id' => 19, 'title' => 'Breaking News: Example Title 19', 'body' => 'This is a short description of the news article number 19.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 19', 'date' => '2024-07-02', 'region' => 'Jawa Barat'],
            ['id' => 20, 'title' => 'Tech Update: Example Title 20', 'body' => 'This is a short description of the news article number 20.', 'category' => 'teknologi', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 20', 'date' => '2024-07-01', 'region' => 'Jawa Tengah'],
            ['id' => 21, 'title' => 'kesehatan Highlight: Example Title 21', 'body' => 'This is a short description of the news article number 21.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 21', 'date' => '2024-06-30', 'region' => 'Jakarta'],
            ['id' => 22, 'title' => 'hiburan Buzz: Example Title 22', 'body' => 'This is a short description of the news article number 22.', 'category' => 'hiburan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 22', 'date' => '2024-06-29', 'region' => 'Jawa Timur'],
            ['id' => 23, 'title' => 'Political Debate: Example Title 23', 'body' => 'This is a short description of the news article number 23.', 'category' => 'politik', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 23', 'date' => '2024-06-28', 'region' => 'Jawa Barat'],
            ['id' => 24, 'title' => 'kesehatan Alert: Example Title 24', 'body' => 'This is a short description of the news article number 24.', 'category' => 'kesehatan', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 24', 'date' => '2024-06-27', 'region' => 'Jawa Tengah'],
            ['id' => 25, 'title' => 'kesehatan Alert: Example Title 25', 'body' => 'This is a short description of the news article number 25.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 25', 'date' => '2024-06-28', 'region' => 'Jawa Tengah'],
            ['id' => 26, 'title' => 'kesehatan Alert: Example Title 26', 'body' => 'This is a short description of the news article number 26.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 26', 'date' => '2024-06-29', 'region' => 'Jawa Tengah'],
            ['id' => 27, 'title' => 'kesehatan Alert: Example Title 27', 'body' => 'This is a short description of the news article number 27.', 'category' => 'olahraga', 'image_url' => 'https://via.placeholder.com/800', 'image_caption' => 'image caption 27', 'date' => '2024-06-30', 'region' => 'Jawa Tengah'],
        ]);
        
    
    // Cari berita berdasarkan ID
    $newsItem = $news->firstWhere('id', $id);

    // Jika berita tidak ditemukan, kembali ke halaman sebelumnya dengan pesan error
    if (!$newsItem) {
        return redirect()->back()->with('error', 'News not found');
    }

    $popularNews = [
        ['title' => 'Popular News with title 1', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-18'],
        ['title' => 'Popular News with title 2', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-17'],
        ['title' => 'Popular News with title 3', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-16'],
        ['title' => 'Popular News with title 4', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-15'],
        ['title' => 'Popular News with title 5', 'image_url' => 'https://via.placeholder.com/80', 'date' => '2024-07-14'],
    ];

    $categories = ['Politik', 'kesehatan', 'Teknologi', 'Hiburan', 'Olahraga'];
    $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah'];
    $relatedNews = $news->where('id', '!=', $id)->take(3);

    return view('user.detail', compact('newsItem', 'popularNews', 'categories', 'regions', 'relatedNews'));
    }
    
}

