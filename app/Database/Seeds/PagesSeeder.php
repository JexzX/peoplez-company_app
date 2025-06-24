<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PagesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Home',
                'slug' => 'home',
                'content' => '<h2>Welcome to Peoplez Company</h2>
                <p>We are a leading company in innovative solutions for businesses worldwide.</p>',
                'meta_description' => 'Peoplez Company provides innovative business solutions',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => '<h2>About Peoplez Company</h2>
                <p>Founded in 2010, we have been serving clients with excellence and dedication.</p>',
                'meta_description' => 'Learn about Peoplez Company history and mission',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Services',
                'slug' => 'services',
                'content' => '<h2>Our Services</h2>
                <ul>
                <li>Consulting</li>
                <li>Web Development</li>
                <li>Digital Marketing</li>
                </ul>',
                'meta_description' => 'Discover the professional services offered by Peoplez Company',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Contact',
                'slug' => 'contact',
                'content' => '<h2>Contact Us</h2>
                <p>Email: info@peoplez.com</p>
                <p>Phone: +1234567890</p>',
                'meta_description' => 'Get in touch with Peoplez Company',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('pages')->insertBatch($data);
    }
}