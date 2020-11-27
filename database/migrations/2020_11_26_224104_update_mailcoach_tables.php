<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Mailcoach\Models\Campaign;

class UpdateMailcoachTables extends Migration
{
    public function up()
    {
        Schema::table('mailcoach_campaigns', function (Blueprint $table) {
            $table->string('reply_to_email')->nullable();
            $table->string('reply_to_name')->nullable();
            $table->timestamp('all_jobs_added_to_batch_at')->nullable();
            $table->string('send_batch_id')->nullable();
        });

        Schema::table('mailcoach_subscribers', function (Blueprint $table) {
            $table->uuid('imported_via_import_uuid')->nullable();
        });

        Schema::table('mailcoach_subscriber_imports', function (Blueprint $table) {
            $table->boolean('subscribe_unsubscribed')->default(false);
            $table->boolean('unsubscribe_others')->default(false);
            $table->text('subscribers_csv')->nullable();
            $table->uuid('uuid')->nullable();
        });

        Schema::table('mailcoach_email_lists', function (Blueprint $table) {
            $table->string('default_reply_to_email')->nullable();
            $table->string('default_reply_to_name')->nullable();
            $table->text('allowed_form_extra_attributes')->nullable();
        });

        Schema::table('mailcoach_sends', function (Blueprint $table) {
            $table->index('uuid');
            $table->index(['campaign_id', 'subscriber_id']);
        });

        Schema::table('webhook_calls', function (Blueprint $table) {
            $table->string('external_id')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->index('external_id');
        });

        // Update existing statistics to use new format
        Campaign::each(function (Campaign $campaign) {
            $campaign->update([
                'open_rate' => $campaign->open_rate * 100,
                'click_rate' => $campaign->click_rate * 100,
                'bounce_rate' => $campaign->bounce_rate * 100,
                'unsubscribe_rate' => $campaign->unsubscribe_rate * 100,
            ]);
        });


        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('update webhook_calls set processed_at = NOW() where processed_at is null;');
        }
    }
}
