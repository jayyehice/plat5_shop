FROM 192.168.110.142:5000/lnp:1.2.0 as base

WORKDIR /var/www/html


# Configure supervisord
COPY  --chown=www-data ./build/config/supervisor /etc/supervisor


FROM 192.168.110.142:5000/builder:1.1.1 as builder

COPY ./ /build

RUN --mount=type=tmpfs,target=/app \
    mv /build/* /app/ && \
    sh /docker-entrypoint.sh && \
    mv /app/* /build


FROM base

# Configure nginx
COPY --chown=root:staff ./build/config/ssl /etc/nginx/ssl
COPY --chown=root:staff ./build/config/htpasswd /etc/nginx/htpasswd

# Configure php-fpm
COPY --chown=root:staff ./build/config/www.conf /usr/local/etc/php-fpm.d/www.conf

COPY --from=builder --chown=www-data /build /var/www/html
COPY --chown=www-data ./docker-entrypoint.sh /docker-entrypoint.sh

# Make sure files/folders needed by the processes are accessable when they run under the www-data user
RUN chown -R www-data.www-data /run && \
    chown -R www-data.www-data /var/www && \
    chown -R www-data.www-data /usr/lib/nginx && \
    chown -R www-data.www-data /var/log/nginx && \
    chmod -R a+r /etc/supervisor/conf.d/supervisord.conf && \
    chmod -R a+r /etc/nginx/nginx.conf && \
    rm -rf /etc/nginx/conf.d/*

RUN chmod 700 /docker-entrypoint.sh

USER www-data

CMD ["sh", "-c", "/docker-entrypoint.sh"]
